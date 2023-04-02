<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\AboutUsCertificatesImage;
use App\Models\AboutUsGoals;
use App\Models\AboutUsReasons;
use App\Models\CourseDate;
use App\Models\Language;
use App\Models\Page as TargetModel;
use App\Models\Setting;
use Illuminate\Support\Facades\Input;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;



class PagesController extends Controller
{
    public function __construct()
    {
        view()->share(['locales' => Language::all(), 'setting' => Setting::query()->first()]);
    }


    public function index()
    {
        return view('admin.pages.home', ['pages' => TargetModel::get()]);
    }


    public function edit($id)
    {
        $item = TargetModel::query()->findOrFail($id);
        $goals = AboutUsGoals::where('page_id' , $id)->get();
        $reasons = AboutUsReasons::where('page_id' , $id)->get();
        return view('admin.pages.edit', ['item' => $item , 'goals' => $goals, 'reasons' => $reasons]);
    }


    public function update(Request $request, $id)
    {
        $page = TargetModel::query()->findOrFail($id);
        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $page->translate($locale)->title = ucwords($request->get('title_' . $locale));
            $page->translate($locale)->description = $request->get('description_' . $locale);
            $page->translate($locale)->header_title = ucwords($request->get('header_title_' . $locale));
            $page->translate($locale)->header_description = $request->get('header_description_' . $locale);
            $page->translate($locale)->certificates_sub_description = $request->get('certificates_sub_description_' . $locale);
            $page->translate($locale)->reasons_sub_description = $request->get('reasons_sub_description_' . $locale);
        }
//
        if(isset($request->header_image)){
            $page->header_image = uploadImage($request->header_image, 'pages');
        }
        $page->save();
        $goals = AboutUsGoals::where('page_id', $page->id)->delete();
        $reasons = AboutUsReasons::where('page_id', $page->id)->delete();


        $goals =$request->get('goals');
        $reasons = $request->get('reasons');


//        if (isset($goals)) {
//            foreach ($goals as $goal){
//                foreach ($locales as $locale) {
//                    $infos= new AboutUsGoals();
//                    $infos->page_id  =  $page->id;
////                    dd($content['content_title_'.$locale] ,  $item->id);
//                    if (isset($goal['goal_title_'.$locale])){
//                        $infos->translateOrNew($locale)->goal_title = $goal['goal_title_'.$locale];
//                    }
//                    if (isset($goal['goal_description_'.$locale])) {
//                        $infos->translateOrNew($locale)->goal_description = $goal['goal_description_' . $locale];
//                    }
//                    $infos->save();
//                }
//            }
//        }
//        if (isset($reasons)) {
//            foreach ($reasons as $reason)
//            {
//                foreach ($locales as $locale) {
//
//                    $reasonInfos= new AboutUsReasons();
//                    $reasonInfos->page_id  =  $page->id;
////                    dd($content['content_title_'.$locale] ,  $item->id);
//                    if (isset($reason['reason_title_'.$locale])){
//                        $reasonInfos->translateOrNew($locale)->reason_title = $reason['reason_title_'.$locale];
//                    }
//                    if (isset($reason['reason_description_'.$locale])){
//                        $reasonInfos->translateOrNew($locale)->reason_description = $reason['reason_description_'.$locale];
//                    }
//                    $reasonInfos->save();
//
//                }
//            }
//        }


        if (isset($goals)) {
            foreach ($goals as $goal){
                    $infos= new AboutUsGoals();
                    $infos->page_id  =  $page->id;
                     $infos->translateOrNew('en')->goal_title = $goal['goal_title_en'];
                     $infos->translateOrNew('ar')->goal_title = $goal['goal_title_ar'];
                     $infos->translateOrNew('en')->goal_description = $goal['goal_description_en'];
                     $infos->translateOrNew('ar')->goal_description = $goal['goal_description_ar'];
                     $infos->save();
            }
        }
        if (isset($reasons)) {
                foreach ($reasons as $reason)
                {
                    $reasonInfos= new AboutUsReasons();
                    $reasonInfos->page_id  =  $page->id;
//                    dd($content['content_title_'.$locale] ,  $item->id);
                        $reasonInfos->translateOrNew('en')->reason_title = $reason['reason_title_en'];
                        $reasonInfos->translateOrNew('ar')->reason_title = $reason['reason_title_ar'];
                        $reasonInfos->translateOrNew('en')->reason_description = $reason['reason_description_en'];
                        $reasonInfos->translateOrNew('ar')->reason_description = $reason['reason_description_ar'];
                    $reasonInfos->save();
            }
        }



        $imgsIds = $page->certificate_images->pluck('id')->toArray();
        $newImgsIds = ($request->has('oldImages'))? $request->oldImages:[];
        $diff = array_diff($imgsIds,$newImgsIds);
        AboutUsCertificatesImage::whereIn('id',$diff)->delete();

        if($request->has('filename')  && !empty($request->filename)){
            foreach($request->filename as $one)
            {
                if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
//                    $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
                    $name = rand(1000000, 9999999) . "_" .str_random(8) . "" .  "" . time() . "" . rand(1000000, 9999999);
                    $newName = $name;
                    Image::make($one)->save("uploads/pages/$newName");
                    $item_image= new AboutUsCertificatesImage();
                    $item_image->image = $newName;
                    $item_image->page_id = $page->id;
                    $item_image->save();
                }
            }
        }

//        return redirect()->back();
        return redirect()->route('admin.pages.index')->with('status', __('cp.update'));

    }


    public function deleteGoal($id)
    {
        $item = AboutUsGoals::query()->findOrFail($id);
//        dd($item);
        if ($item) {
            AboutUsGoals::query()->where('id', $id)->delete();
            return response('success', 200);

        }else{
            return "fail";
        }
    }

    public function deleteReason($id)
    {
        $item = AboutUsReasons::query()->findOrFail($id);
//        dd($item);
        if ($item) {
            AboutUsReasons::query()->where('id', $id)->delete();
            return response('success', 200);

        }else{
            return "fail";
        }
    }


}
