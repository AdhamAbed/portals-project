<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Project;
use App\Models\ProjectGallery;
use App\Models\Setting;
use Illuminate\Http\Request;

use Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index()
    {
        $items  = Project::latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.projects.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.projects.create');
    }



    public function store(Request $request)
    {
        $roles = [
            // 'logo' => 'required|image|mimes:jpeg,jpg,png',
        ];

        $locales = Language::all()->pluck('lang');

        $roles['image'] = 'required';
        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
            $roles['subdescription_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new Project();

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $item->translateOrNew($locale)->subdescription = $request->get('subdescription_' . $locale);
            $item->translateOrNew($locale)->customer_name = $request->get('customer_name_' . $locale);
        }

        $item->date = $request->date;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/projects/".$file_name);
            $item->image = $file_name;
        }
//        if ($request->hasFile('project_gallery')){
////        if (isset($attributes['project_gallery'])){
//            foreach ($request->file('project_gallery') as $image) {
//                $extention = $image->getClientOriginalExtension();
//                $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
//                Image::make($image)->save("uploads/projects/".$file_name);
//                $photo = new ProjectGallery(
//                    [
//                        'image' => $file_name,
//                        'project_id' => $item->id,
//                    ]);
//                $photo->save();
////
//            }
//        }
        $item->save();

        if($request->has('filename')  && !empty($request->filename)){
            foreach($request->filename as $one)
            {
                if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
                    $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
                    $name = rand(1000000, 9999999) . "_" .str_random(8) . "" .  "" . time() . "" . rand(1000000, 9999999);
                    $newName = $name. ".jpg";
                    Image::make($one)->save("uploads/projects/$newName");
                    $item_image= new ProjectGallery();
                    $item_image->image = $newName;
                    $item_image->project_id = $item->id;
                    $item_image->save();
                }
            }
        }
        return redirect()->back()->with('status', __('cp.create'));

    }


    public function edit($id)
    {
        $item = Project::findOrFail($id);
        $images = ProjectGallery::where('project_id' , $id)->get();
        return view('admin.projects.edit', ['item' => $item , 'images' =>$images]);
    }


    public function update(Request $request, $id)
    {

        $locales = Language::all()->pluck('lang');

//        $roles['image'] = 'required';
        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
            $roles['subdescription_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = Project::query()->findOrFail($id);

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $item->translateOrNew($locale)->subdescription = $request->get('subdescription_' . $locale);
            $item->translateOrNew($locale)->customer_name = $request->get('customer_name_' . $locale);
        }


        $item->date = $request->date;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/projects/".$file_name);
            $item->image = $file_name;
        }

        $item->save();

        $imgsIds = $item->photos->pluck('id')->toArray();
        $newImgsIds = ($request->has('oldImages'))? $request->oldImages:[];
        $diff = array_diff($imgsIds,$newImgsIds);
        ProjectGallery::whereIn('id',$diff)->delete();

        if($request->has('filename')  && !empty($request->filename)){
            foreach($request->filename as $one)
            {
                if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
                    $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
                    $name = str_random(15) . "_" .str_random(8) . "_" .  "_" . time() . "_" . rand(1000000, 9999999);
                    $attachType = 0;
                    if (in_array($fileType, ['jpg','jpeg','png','pmb'])){
                        $newName = $name. ".jpg";
                        $attachType = 1;
                        Image::make($one)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/projects/$newName");
                    }

                    $item_image= new ProjectGallery();
                    $item_image->image = $newName;
                    $item_image->project_id = $item->id;
                    $item_image->save();
                }
            }
        }
        return redirect()->back()->with('status', __('cp.update'));
    }


    public function destroy($id)
    {
        $item = Project::query()->findOrFail($id);
        if ($item) {
            Project::query()->where('id', $id)->delete();

            return "success";
        }
        return "fail";
    }

    public function galleryDelete($id)
    {
        $gallery = ProjectGallery::find($id);

        if (isset($gallery) && $gallery->delete())
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
//            return response_api(true, 200, __('app.success'), []);
//        return response_api(false, 422, __('app.error'), []);

    }

}

//        if ($request->hasFile('project_gallery')){
////        if (isset($attributes['project_gallery'])){
//            foreach ($request->file('project_gallery') as $image) {
//                $extention = $image->getClientOriginalExtension();
//                $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
//                Image::make($image)->save("uploads/projects/".$file_name);
//                $photo = new ProjectGallery(
//                    [
//                        'image' => $file_name,
//                        'project_id' => $item->id,
//                    ]);
//                $photo->save();
////
//            }
//        }
