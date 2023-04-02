<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use App\Models\SliderImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Image;

class SettingController extends Controller
{


    public function __construct()
    {
        $this->locales = Language::all();
        view()->share(['locales' => $this->locales]);
    }


    public function index()
    {
        $item = Setting::query()->first();
        $sliderImages = SliderImages::where('section' , 'home_header')->get();
//        dd($item);

        return view('admin.settings.edit', ['item' => $item , 'sliderImages' => $sliderImages]);

    }



    public function update(Request $request)
    {

        $locales = Language::all()->pluck('lang');
        $roles = [
            'url' => 'nullable|url',
            'info_email' => 'required|email',
            'mobile' => 'nullable|numeric',
            'phone' => 'nullable|numeric',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linked_in' => 'nullable|url',
            'instagram' => 'nullable|url',
        ];

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['address_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $setting = Setting::query()->findOrFail(1);

        $setting->url = trim($request->get('url'));
        $setting->info_email = trim($request->get('info_email'));
        $setting->mobile = trim($request->get('mobile'));
        $setting->phone = trim($request->get('phone'));
        $setting->whatsapp = trim($request->get('whatsapp'));
        $setting->facebook = trim($request->get('facebook'));
        $setting->twitter = trim($request->get('twitter'));
        $setting->linked_in = trim($request->get('linked_in'));
        $setting->instagram = trim($request->get('instagram'));

        $setting->latitude = trim($request->get('latitude'));
        $setting->longitude = trim($request->get('longitude'));
        $setting->clients_count = $request->get('clients_count');
        $setting->users_count = $request->get('users_count');
        $setting->projects_count = $request->get('projects_count');
        $setting->courses_count = $request->get('courses_count');


        if(isset($request->colorful_logo)){
            $setting->colorful_logo = uploadImage($request->colorful_logo, 'settings');
        }

        if(isset($request->white_logo)){
            $setting->white_logo = uploadImage($request->white_logo, 'settings');
        }

        if(isset($request->second_logo)){
            $setting->second_logo = uploadImage($request->second_logo, 'settings');
        }

//        if(isset($request->header_background)){
//            $setting->header_background = uploadImage($request->header_background, 'settings');
//        }




        foreach ($locales as $locale) {
            $setting->translate($locale)->title = trim(ucwords($request->get('title_' . $locale)));
            $setting->translate($locale)->address = trim(ucwords($request->get('address_' . $locale)));
            $setting->translate($locale)->description = ucwords($request->get('description_' . $locale));
            $setting->translate($locale)->header_title = ucwords($request->get('header_title_' . $locale));
            $setting->translate($locale)->header_description = ucwords($request->get('header_description_' . $locale));
            $setting->translate($locale)->training_features_subtitle = ucwords($request->get('training_features_subtitle_' . $locale));
            $setting->translate($locale)->training_features_title = ucwords($request->get('training_features_title_' . $locale));
            $setting->translate($locale)->training_courses_subtitle = ucwords($request->get('training_courses_subtitle_' . $locale));
            $setting->translate($locale)->training_courses_title = ucwords($request->get('training_courses_title_' . $locale));
            $setting->translate($locale)->training_consultants_subtitle = ucwords($request->get('training_consultants_subtitle_' . $locale));
            $setting->translate($locale)->training_consultants_title = ucwords($request->get('training_consultants_title_' . $locale));
            $setting->translate($locale)->trainees_subtitle = ucwords($request->get('trainees_subtitle_' . $locale));
            $setting->translate($locale)->trainees_title = ucwords($request->get('trainees_title_' . $locale));
            $setting->translate($locale)->blog_subtitle = ucwords($request->get('blog_subtitle_' . $locale));
            $setting->translate($locale)->blog_title = ucwords($request->get('blog_title_' . $locale));
            $setting->translate($locale)->faqs_subtitle = ucwords($request->get('faqs_subtitle_' . $locale));
            $setting->translate($locale)->faqs_title = ucwords($request->get('faqs_title_' . $locale));
            $setting->translate($locale)->footer_description = ucwords($request->get('footer_description_' . $locale));
        }

//        $imgsIds = SliderImages::where('section' , 'home_header')->pluck('id')->toArray();
//        $newImgsIds = ($request->has('oldImages'))? $request->oldImages:[];
//        $diff = array_diff($imgsIds,$newImgsIds);
//        SliderImages::whereIn('id',$diff)->delete();
//
//        if($request->has('filename')  && !empty($request->filename)){
//
//
//            foreach($request->filename as $one)
//            {
//                if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
//                    $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
//                    $name = rand(1000000, 9999999) . "_" .str_random(8) . "" .  "" . time() . "" . rand(1000000, 9999999);
//                    $newName = $name. ".jpg";
//                    Image::make($one)->save("uploads/settings/$newName");
//                    $item_image= new SliderImages();
//                    $item_image->image = $newName;
//                    $item_image->section = 'home_header';
//                    $item_image->save();
//                }
//            }
//        }

        $setting->save();
        return redirect()->route('admin.settings.all')->with('status', __('cp.update'));
    }
}
