<?php

namespace App\Http\Controllers\API;


use App\User;

use App\Models\CartAddition;
use App\Models\City;
use App\Models\Setting;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\UserWallet;
use App\Models\Coupon;

use Carbon\Carbon;


use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Token;
use App\Models\NotificationMessage;

use Illuminate\Support\Facades\Validator;
use Image;
use DB;


class CartController extends Controller
{
    public function image_extensions()
    {
        return array('jpg', 'png', 'jpeg', 'gif', 'bmp');
    }




  public function addProductToCart(Request $request)
    {

        $rules = [
            'product_id'=> 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'message' => implode("\n",$validator->messages()->all())]);
        }

        $product = Product::where(['id' => $request->product_id, 'status' => 'active'])->first();

        if(!$product){
            return response()->json(['status' => false, 'code' => 200, 'message' => __('api.youCantAddThisProductNow')]);
        }

        $check_cart =  Cart::where(['user_id' => Auth::user()->id, 'product_id' => $request->product_id])->first();

        if($check_cart){
            $check_cart->quantity = $check_cart->quantity + 1;
            $check_cart->save();
            $message = __('api.addedToCart');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'cart' => $check_cart ]);
        }
        
        $cart = new Cart();
        $cart->user_id =  Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->save();

        $message = __('api.addedToCart');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'cart' => $cart ]);

    }



    public function deleteFromCart(Request $request)
    {
        
        $rules = [
            'product_id'=> 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'message' => implode("\n",$validator->messages()->all())]);
        }

        $cart = Cart::where(['product_id' => $request->product_id, 'user_id' => Auth::user()->id])->delete();

        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
    }
    
    
    
    
    public function changeQuantity(Request $request)
    {

        $rules = [
            'product_id' => 'required',
            'type' => 'required|in:decrease,increase',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'message' => implode("\n",$validator->messages()->all())]);
        }

        $cart = cart::where(['product_id' => $request->product_id, 'user_id' => Auth::user()->id])->first();
        
        
        if(!$cart){
              $message = __('api.productNotFound');
            return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
        }

        
        if ($request->type == 'increase') {
            $newValue = $cart->quantity + 1;
            $cart->update(['quantity' => $newValue]);
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'cart'=>$cart]);
        }
        
        
        if ($request->type == 'decrease' ) {
            if($cart->quantity == 1){
                $cart->delete();
                $message = __('api.deleteFromCart');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
            }

            $newValue = $cart->quantity - 1;
            $cart->update(['quantity'=>$newValue]);
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'cart'=>$cart]);
        } 
    }
    



    public function myCart(Request $request)
    {
       
        $check_cart =  Cart::where(['user_id' => Auth::user()->id])->get();

        $total_price = 0;
        $final_total = 0;
        $delivery_cost = Setting::orderBy('id','desc')->first()->delivery_cost;
        
        
        foreach($check_cart as $one){
            $total_price += $one->quantity * $one->product->active_price;
        }
        
        $discount = 0;
        $total_price = $total_price + $delivery_cost;


        if($request->coupon){
            $date = date('Y-m-d');
            $checkCoupon = Coupon::where('name', $request->coupon)->whereDate('end','>=', $date)->whereDate('start','<=', $date)->where('status','active')->first();
            
            if(!$checkCoupon){
                return response()->json(['status' => false, 'code' => 201, 'message' => __('api.couponError') ]);  
            }else{
                $discount = $checkCoupon->discount;
                $final_total = $total_price - ($total_price / $discount);
            }
        }else{
            $final_total = $total_price;
        }
        


        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message  ,'myCart' => $check_cart, 'delivery_cost' => $delivery_cost, 'total_price' => $total_price, 'final_total' => $final_total ]);
    }




    public function checkCoupon(Request $request)
    {

        $rules = [
            'coupon' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'message' => implode("\n", $validator->messages()->all())]);
        }

        $date = date('Y-m-d');

        $coupon = Coupon::where('name', $request->coupon)->whereDate('end','>=',$date)->whereDate('start','<=',$date)->where('status','active')->first();

            if(isset($coupon)){
                return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'coupon' => $coupon]);
            } else{
                return response()->json(['status' => false, 'code' => 200, 'message' =>__('api.couponError')]);
            }
    }



   public function checkout(Request $request)
    {
        
        // $rules = [
        //     'payment_method' => 'required',
        // ];

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()){
        //     return response()->json(['status' => false, 'code' => 200, 'message' =>implode("\n",$validator->messages()->all())]);
        // }
        

        $sub_total = 0;
        $final_total = 0;
        
        $order = new Order();
        $order->user_id = auth('api')->user()->id;
        $order->user_address_id = $request->user_address_id;
        $order->user_address_id = $request->user_address_id;
        $order->payment_method = $request->payment_method;
        $order->final_total = $final_total;
        $order->save();
        
        
        $products =  json_decode($request->products, true);
        
        foreach($products as $product){
            $price = Product::where('id', $product['product_id'])->first()->price;
            
            $order_products = new OrderProduct();
            $order_products->order_id = $order->id;
            $order_products->product_id = $product['product_id'];
            $order_products->color_id = $product['color_id'];
            $order_products->size_id = $product['size_id'];
            $order_products->quantity = $product['quantity'];
            $order_products->price = $price;
            $order_products->save();
            $sub_total = $sub_total + ($product['quantity'] * $price);
        }
        
        
        // $sub_total = number_format((float)($sub_total), 2);
        $checkOrder = Order::findOrFail($order->id);
        $checkOrder->sub_total = $sub_total;
        $checkOrder->save();



        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'order' => $order]);
    }
    
    
    
    

    
    
    



}
