<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    //


    public function change_languge(Request $request , $lang){

        // dd(App::getLocale());
        $language = in_array($lang , ['en','ar']) ?  $lang : 'en';
       if(! App::isLocale($language)){
        App::setLocale($language);
        session()->put('lang',$language);
       }
       return redirect()->back();

    }

}
