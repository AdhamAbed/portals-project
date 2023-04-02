<?php
namespace App\Http\Controllers\API;
use App\Models\Ad;
use App\Models\Category;

use App\Models\Product;
use App\Models\Question;
use App\Models\City;
use App\Models\Cart;
use App\Models\Service;
use App\Models\AdditionService;
use App\Models\Page;
use App\Models\Contact;
use App\Models\OrderProduct;
use App\Models\Favorite;
use App\Models\ProductReview;
use App\Models\SpecialRequest;
use App\Models\Reminder;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Productoffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ProductController extends Controller
{



    public function getProductsByCategoryId($id, Request $request)
    {
        $products = Product::where('status', 'active')->where('category_id', $id)->orderBy('created_at','desc')->paginate(222222);//->get();
 
        
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message,'products' => $products ]);
    }
    public function getProductById($id)
    {
        $product = Product::where('status', 'active')->with('attachments','additions')->findOrFail($id);
 
        
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message,'product' => $product ]);
    }
    public function getLastProducts()
    {
        $products = Product::where('status', 'active')->orderBy('newest','desc')->orderBy('created_at','desc')->paginate(222222);
 
        
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message,'products' => $products ]);
    }
    
    

    public function getOffers(Request $request)
    {
       $productoffer=Productoffer::where('offer_from','<=',now()->toDateString())->where('offer_to' ,'>=', now()->toDateString())->with('product')->get();

        $message = __('api.ok');
         return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'productoffer' => $productoffer]);

    }

    public function home()
    {
        $categories = Category::query()->where('status', 'active')->get();
        $last_products = Product::where('status', 'active')->orderBy('newest','desc')->orderBy('created_at','desc')->take(10)->get();
        $most_sale_products=Product::where('status', 'active')->orderBy('top_selling','desc')->orderBy('created_at','desc')->take(10)->get();
        $productoffer=Productoffer::where('offer_from','<=',now()->toDateString())->where('offer_to' ,'>=', now()->toDateString())->take(10)->with('product')->get();

        
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message,'categories' => $categories ,'most_sale_products' => $most_sale_products ,'last_products' => $last_products ,'productoffer' => $productoffer ]);
    }
    public function topSaling()
    {
       // $last_products = Product::where('status', 'active')->orderBy('created_at','desc')->take(10)->get();
       // $most_sale_products = OrderProduct::orderBy('created_at','desc')->take(10)->with('product')->get();
        //  $most_sale_products= DB::table('order_products')
        //   ->select('order_products.*',DB::raw('COUNT(product_id) as count'))
        //   ->groupBy('product_id')
        //   ->orderBy('count','desc')
        //   ->join('products', 'products.id' , '=', 'order_products.product_id' )
        //   ->get();
           
        // $most_sale_products=OrderProduct::select('product_id')
        // ->groupBy('product_id')
        // ->orderByRaw('COUNT(*) DESC')
        // ->take(10)
        //  ->with('product')
        // ->paginate(20);
        $most_sale_products = Product::where('status', 'active')->orderBy('top_selling','desc')->orderBy('created_at','desc')->paginate(200000);


        
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message,'most_sale_products' => $most_sale_products ]);
    }

    public function getMyFavorites(Request $request)
    {   
        $favorites = Favorite::where('fcm_token',$request->header('fcmToken'))->with('product')->paginate(2222222);
      
        if ($favorites->count() > 0) {
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'favorites' => $favorites]);

        } else {
            $message = __('api.not_found');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'favorites' => $favorites]);

        }
    }

    

    public function addFavoriteOffer(Request $request , $id)
    {
        
        if(Favorite::where('fcm_token',$request->header('fcmToken'))->where('product_id',$id)->exists())
        {
            $message = __('api.item-added');
             return response()->json(['status' => true, 'code' => 200, 'message' =>  $message]);

        }else{  
            $fevorite= new Favorite();
            $fevorite->fcm_token=$request->header('fcmToken');
            $fevorite->product_id=$id;
            $fevorite->save();
          }
          
           if ($fevorite) {
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);

           } else {
             $message = __('api.not_found');
             return response()->json(['status' => true, 'code' => 200, 'message' => $message]);

          }
    }

    public function deleteFromFavorit(Request $request , $id)
    {
        //
        $item = Favorite::where('fcm_token',$request->header('fcmToken'))->where('product_id',$id)->first();
        if ($item) {
            Favorite::query()->where('product_id', $id)->delete();

            $message = __('api.ok');

            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
        }
        $massege =__('api.whoops');
        return response()->json(['status' => false, 'code' => 200, 'message' => $massege ]);
    }



    public function search(Request $request)
    {
        $items = Product::query();

        if ($request->has('text') && $request->text != '') {
            $search=$request->get('text');
            $products=Product::whereTranslationLike('name', '%'. $search.'%')->paginate(222222);
                  
                $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'products' => $products]);
 

        }


    }
    public function filter(Request $request)
    {
        $products = Product::where('status','active');

           if ($request->has('offers') ) {
            if ($request->get('offers') ==1)
            {   
             $productoffer=Productoffer::where('offer_from','<=',now()->toDateString())->where('offer_to' ,'>=', now()->toDateString())->pluck('product_id')->toArray();
              $products =  $products->whereIn('id',$productoffer);      
            }
        }
        
        if ($request->has('min_price') and $request->has('max_price') ) {
            if ($request->get('min_price') != null and $request->has('max_price') != null)
            {   
              
              $products =  $products->whereBetween('price', [$request->get('min_price') ,$request->get('max_price')]);      
            }
        }
        
       if ($request->has('category_id') ) {
            if ($request->get('category_id') != null)
            {   
              $products =  $products->where('category_id', $request->get('category_id'));      
            }
        }


        
       if ($request->has('price_ordering') ) {
            if ($request->get('price_ordering') ==1)
            {   
              $products =  $products->orderBy('price' ,'asc')->paginate(2222222);      
            }else{
               $products =  $products->orderBy('price' ,'desc')->paginate(222222); 
            }
        }else{
            $products =  $products->orderBy('id' ,'desc')->paginate(2222222);  
        }
        

              
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'products' => $products]);
 

        


    }
    
    public function productReview(Request $request)
    {
      
       $validator = Validator::make($request->all(), [

            'rate' => 'required|digits_between:1,5',        
            'comment' => 'required',        
 
           ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' =>implode("\n",$validator-> messages()-> all()) ]);
            }
            
        $review =new ProductReview();
        
         $review->user_id=auth('api')->user()->id; 
         $review->rate=convertAr2En($request->rate);
         $review->product_id=$request->product_id;
         $review->comment=$request->comment;
         $review->save();
         

         $avg_rate = ProductReview::avg('rate');
        $product_rate=Product::where('id',$request->product_id)->first();

        $product_rate->rate =round($avg_rate);
        $product_rate->save();
        
        $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message,  ]);

    }
    
    public function specialRequest(Request $request)
    {
      
       $validator = Validator::make($request->all(), [
            'details' => 'required ',        
 
           ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' =>implode("\n",$validator-> messages()-> all()) ]);
            }
            
        $requestt =new SpecialRequest();
        
         $requestt->user_id=auth('api')->user()->id; 
         $requestt->details =$request->details ;
         $requestt->save();
         
        $mySpecialRequest= SpecialRequest::findOrFail($requestt->id);
        $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'mySpecialRequest'=>$mySpecialRequest ]);

    }
    public function reminder(Request $request)
    {
      
       $validator = Validator::make($request->all(), [
            'title' => 'required ',        
 
           ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' =>implode("\n",$validator-> messages()-> all()) ]);
            }
            
        $reminder =new Reminder();
        
         $reminder->user_id=auth('api')->user()->id; 
         $reminder->delivery_date =$request->delivery_date ;
         $reminder->title =$request->title ;
         $reminder->event_category_id =$request->event_category_id ;
         $reminder->remind_at =$request->remind_at ;
         $reminder->save();
         
        
        $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'reminder'=>$reminder]);

    }
    
    



}





