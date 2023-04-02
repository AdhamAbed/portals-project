<?php


use App\Models\Setting;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;


use App\User;
//use Image;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;


function can($permission)
{
    $userCheck = auth()->guard('admin')->check();
    $user='';

    if($userCheck==false)
    {
        return redirect('admin/login');
    }
    else
    {
        $user=  auth()->guard('admin')->user();
    }
    if ($user->id == 40) {
        return true;
    }

//Cache::forget('permissions_' . $user->id);

    $minutes = 5;
    $permissions = Cache::remember('permissions_' . $user->id, $minutes, function () use ($user) {

        return explode(',', $user->permission->permission);

    });


    $permissions = array_flatten($permissions);
    return in_array($permission, $permissions);

    //@if(can('reservations.panel'))
}

    function is_active(string $routeName){
         return null !== request()->segment(1) && request()->segment(1) == $routeName ? 'active' : '' ;
    }

    function has_permission($route_name)
    {
        if(auth()->guard('admin')->user()->id == 1){
            return true;
        }

        $checkPermission = Permission::where('route_name', $route_name)->first();

        if(!$checkPermission){
            return false;
        }


        $rolePermissionsIDs = RolePermission::where('role_id', auth()->guard('admin')->user()->role_id)->pluck('permission_id')->toArray();
        $roleParentsPermissionsIDs = Permission::whereIn('id', $rolePermissionsIDs)->pluck('parent_id')->toArray();

        if(in_array($checkPermission->id, $rolePermissionsIDs)){
            return true;
        }


        if(in_array($checkPermission->id, $roleParentsPermissionsIDs)){
            return true;
        }




        return false;
    }



    function uploadImage($file, $path){
        $image = $file;
        $extention = $image->getClientOriginalExtension();
        $file_name = rand(1, 100) . rand(1000000, 9999999) . time() . rand(1, 200) . "." . $extention;
        Image::make($image)->save('uploads/' . $path . '/' . $file_name);
        return $file_name;
    }


    function uploadFile($file, $path){
        $extension = $file->getClientOriginalExtension();
        $filename  = rand(1, 1000) . "_" . time() . "_" . rand(1,50000) . 'book.' .$extension;
        $destinationPath = 'uploads/' . $path;
        $file->move($destinationPath, $filename);
        return $filename;
    }


function lang()
{
    $lang = session('locale');

    if (!isset($lang))
        $lang = "en";

    \Illuminate\Support\Facades\App::setLocale($lang);

    $dir = ($lang == "ar") ? "rtl" : "ltr";
    $float = ($lang == "ar") ? "right" : "left";
    $float_op = ($lang == "ar") ? "left" : "right";

    return ['lang' => $lang, 'dir' => $dir, 'float' => $float, 'float_op' => $float_op];
}

function intWithStyle($n)
{
    if ($n < 1000) return $n;
    $suffix = ['','k','M','G','T','P','E','Z','Y'];
    $power = floor(log($n, 1000));
    return round($n/(1000**$power),1,PHP_ROUND_HALF_EVEN).$suffix[$power];
};

function admin_assets($dir)
{
    return url('/admin_assets/assets/' . $dir);
}

function assets($folder)
{
    return url('/' . $folder . '/assets');
}

function getLocal()
{
    return app()->getLocale();
}

function mainResponse($status, $message, $data, $code, $key,$validator){
    try {
        $result['status'] = $status;
        $result['code'] = $code;
        $result['message'] = $message;

        if ($validator && $validator->fails()) {
            $errors = $validator->errors();
            $errors = $errors->toArray();
            $message = '';
            foreach ($errors as $key => $value) {
                $message .= $value[0] . ',';
            }
            $result['message'] = $message;
            return response()->json($result, $code);
        }elseif (!is_null($data)) {


            if ($status) {
                if ($data != null && array_key_exists('data', $data)) {
                    $result[$key] = $data['data'];
                } else {
                    $result[$key] = $data;
                }
            } else {
                $result[$key] = $data;
            }
        }
        return response()->json($result, $code);
    } catch (Exception $ex) {
        return response()->json([
            'line' => $ex->getLine(),
            'message' => $ex->getMessage(),
            'getFile' => $ex->getFile(),
            'getTrace' => $ex->getTrace(),
            'getTraceAsString' => $ex->getTraceAsString(),
        ], $code);
    }
}

function convertAr2En($string){
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
    return $englishNumbersOnly;
}

function payment( $amount, $order_id){

    $apikey = "";		// enter your API key here
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "accept: application/vnd.ni-identity.v1+json",
        "authorization: Basic ".$apikey,
        "content-type: application/vnd.ni-identity.v1+json"
      ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,  "{\"realmName\":\"ni\"}");
    $output = json_decode(curl_exec($ch));
    $access_token = $output->access_token;
    $token = $access_token;
    $postData = new StdClass();
    $postData->action = "SALE";
    $postData->emailAddress = "info@expressunionportal.com";
    $postData->amount = new StdClass();
    $postData->amount->currencyCode = "AED";
    $postData->amount->value = $amount;
    $postData->merchantAttributes = new StdClass();
    $postData->merchantAttributes->redirectUrl = route('checkPayment');
    $postData->merchantAttributes->skipConfirmationPage = true;
    $postData->merchantDefinedData = new StdClass();
    $postData->merchantDefinedData->orderId = $order_id;
    $postData->billingAddress = new StdClass();
    $postData->billingAddress->firstName = "express";
    $postData->billingAddress->lastName = "union";
    $postData->billingAddress->address1 = "plot 18 - Port saeed deira";
    $postData->billingAddress->city = "Dubai";
    $postData->billingAddress->countryCode = "UAE";

    $outlet = "83dd98a4-7b22-44d3-af97-5a74be56e3c7";


    $json = json_encode($postData);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    	"Authorization: Bearer ".$token,
    	"Content-Type: application/vnd.ni-payment.v2+json",
    	"Accept: application/vnd.ni-payment.v2+json"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

    $output = json_decode(curl_exec($ch));
    // dd($output) ;
    $order_reference = $output->reference;
    $order_paypage_url = $output->_links->payment->href;

    curl_close ($ch);
    return $output;
}

function checkpayment($ref){

    $apikey = "";		// enter your API key here
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "accept: application/vnd.ni-identity.v1+json",
        "authorization: Basic ".$apikey,
        "content-type: application/vnd.ni-identity.v1+json"
      ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,  "{\"realmName\":\"ni\"}");
    $output = json_decode(curl_exec($ch));
    $access_token = $output->access_token;
     $token = $access_token;
    $outlet = "83dd98a4-7b22-44d3-af97-5a74be56e3c7";
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer ".$token,
        "accept: application/vnd.ni-payment.v2+json"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
}

function random_number($digits){
    return str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
}

function type(){
    return [__('common.store'),__('common.product'),__('common.url')];
}

function position(){
    return [__('common.site'),__('common.mobile')];
}

function typeArrive(){


    return[
        '1'=>__('print.delivery'),
            '2'=>__('print.pickup'),
            '3'=>__('print.both')
        ];

}

function optionArrive(){


    return[

        '1'=>__('print.have_delivery_team'),
        '2'=>__('print.link_delivery_company'),
        '3'=>__('print.both')
    ];

}


function sendNotificationToClient( $tokens_android, $tokens_ios, $order_id, $message,$code=200 ){
    try {
        $headers = [
            'Authorization: key=AAAAW5jqyWM:APA91bGP8_YBLaR9tA5CYdFfZlmzW31s8zIei1sPoCBuCTG0yoZ0uoaHrjWC-lbg6GrcS-FR6rRako97Q7KQ4d-QzvYP0z86VVIPKJBw2ZGhh7VurD7LUANVhMbNcOtDu4VecSrsxpx8',
            'Content-Type: application/json'
        ];

        if(!empty($tokens_ios)) {
            $dataForIOS = [
                "registration_ids" => $tokens_ios,
                "notification" => [
                    'body' => $message,
                    'type' => "notify",
                    'title' => 'AlraadApp',
                    'code' => $code,
                    'order_id' => $order_id,
                    'badge' => 1,
                    'icon' => 'myicon',//Default Icon
                    'sound' => 'mySound'//Default sound
                ]
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataForIOS));
            $result = curl_exec($ch);
            curl_close($ch);
            // $resultOfPushToIOS = "Done";
            //   return $result; // to check does the notification sent or not
        }
        if(!empty($tokens_android)) {
            $dataForAndroid = [
                "registration_ids" => $tokens_android,
                "data" => [
                    'body' => $message,
                    'type' => "notify",
                    'title' => 'AlraadApp',
                    'order_id' => $order_id,
                    'code' => $code,
                    'badge' => 1,
                    'icon' => 'myicon',//Default Icon
                    'sound' => 'mySound'//Default sound
                ]
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataForAndroid));
            $result = curl_exec($ch);
            curl_close($ch);
            //    $resultOfPushToAndroid = "Done";
        }
        //   return $resultOfPushToIOS." ".$resultOfPushToAndroid;
        //    return $result;
    } catch (\Exception $ex) {
        return $ex->getMessage();
    }





}


function pageNum(){
    if(isset($_GET['page'])){
        $pageNum = $_GET['page'];
    }else{
        $pageNum = 1;
    }
    return ($pageNum-1) * Setting::query()->first()->rows_pagination_count;
}


function slugURL($title){
    $WrongChar = array('@', '؟', '.', '!','?','&','%','$','#','{','}','(',')','"',':','>','<','/','|','{','^');

    $titleNoChr = str_replace($WrongChar, '', $title);
    $titleSEO = str_replace(' ', '-', $titleNoChr);
    return $titleSEO;
}

function pointInPolygon($point, $polygon) {
  //  pointOnVertex = true;

    // Transform string coordinates into arrays with x and y values
    $point = pointStringToCoordinates($point);
    $vertices = array();
    foreach ($polygon as $vertex) {
        $vertices[] = pointStringToCoordinates($vertex);
    }

    // Check if the point sits exactly on a vertex
    if (pointOnVertex($point, $vertices) == true) {
        return true;
    }

    // Check if the point is inside the polygon or on the boundary
    $intersections = 0;
    $vertices_count = count($vertices);

    for ($i=1; $i < $vertices_count; $i++) {
        $vertex1 = $vertices[$i-1];
        $vertex2 = $vertices[$i];
        if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Check if point is on an horizontal polygon boundary
            return true;
        }
        if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) {
            $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x'];
            if ($xinters == $point['x']) { // Check if point is on the polygon boundary (other than horizontal)
                return true;
            }
            if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
                $intersections++;
            }
        }
    }
    // If the number of edges we passed through is odd, then it's in the polygon.
    if ($intersections % 2 != 0) {
        return true;
    } else {
        return false;
    }
}

function pointOnVertex($point, $vertices) {
    foreach($vertices as $vertex) {
        if ($point == $vertex) {
            return true;
        }
    }

}

function pointStringToCoordinates($pointString) {
    $coordinates = explode(" ", $pointString);
    return array("x" => $coordinates[0], "y" => $coordinates[1]);
}

function get_center($coords)
{
    $count_coords = count($coords);
    $xcos=0.0;
    $ycos=0.0;
    $zsin=0.0;

        foreach ($coords as $lnglat)
        {
            $lat = $lnglat['latitude'] * pi() / 180;
            $lon = $lnglat['longitude'] * pi() / 180;

            $acos = cos($lat) * cos($lon);
            $bcos = cos($lat) * sin($lon);
            $csin = sin($lat);
            $xcos += $acos;
            $ycos += $bcos;
            $zsin += $csin;
        }

    $xcos /= $count_coords;
    $ycos /= $count_coords;
    $zsin /= $count_coords;
    $lon = atan2($ycos, $xcos);
    $sqrt = sqrt($xcos * $xcos + $ycos * $ycos);
    $lat = atan2($zsin, $sqrt);

    return number_format($lat * 180 / pi(),6).','.number_format($lon * 180 / pi(),6);
}


