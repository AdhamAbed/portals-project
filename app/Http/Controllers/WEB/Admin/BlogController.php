<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog as TargetModel;
use App\Models\BlogGallery;
use App\Models\Language;
use App\Models\ProjectGallery;
use App\Models\Setting;
use Illuminate\Http\Request;

use Image;

class BlogController extends Controller
{


    public function __construct()
    {
        $this->baseFolder = 'admin.blogs';
        $this->indexRoute = 'admin.blogs.index';
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index(Request $request)
    {
        $items = TargetModel::query();
        $items = $items->latest()->paginate(20);
        return view($this->baseFolder . '.home', ['items' => $items]);
    }


    public function create()
    {
        return view($this->baseFolder . '.create');
    }


    public function store(Request $request)
    {

        $roles = [
            'image' => 'required|mimes:jpeg,jpg,png,gif',
//            'date' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
            $roles['subdescription_' . $locale] = 'required';
            $roles['author_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();
        if ($request->date == ''){
            $item->date = $request->date;

        }else{
            $item->date = date('y-m-d');
        }


        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $item->translateOrNew($locale)->subdescription = $request->get('subdescription_' . $locale);
            $item->translateOrNew($locale)->author = $request->get('author_' . $locale);
        }

        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'blogs');
        }

        $item->save();

        if($request->has('filename')  && !empty($request->filename)){
            foreach($request->filename as $one)
            {
                if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
                    $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
                    $name = rand(1000000, 9999999) . "_" .str_random(8) . "" .  "" . time() . "" . rand(1000000, 9999999);
                    $newName = $name. ".jpg";
                    Image::make($one)->save("uploads/blogs/$newName");
                    $item_image= new BlogGallery();
                    $item_image->image = $newName;
                    $item_image->blog_id = $item->id;
                    $item_image->save();
                }
            }
        }



        return redirect()->route($this->indexRoute)->with('status', __('cp.create'));
    }


    public function show($id)
    {
        $item = TargetModel::findOrFail($id);
        return view($this->baseFolder . '.show', ['item' => $item]);
    }


    public function edit($id)
    {
        $item = TargetModel::findOrFail($id);
        $images = BlogGallery::where('blog_id' , $id)->get();
        return view($this->baseFolder . '.edit', [
            'item' => $item,
            'images' => $images,
        ]);
    }


    public function update(Request $request, $id)
    {

        $roles = [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
            $roles['subdescription_' . $locale] = 'required';
            $roles['author_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);
        $item->date = $request->date ?? date('y-m-d');

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $item->translateOrNew($locale)->subdescription = $request->get('subdescription_' . $locale);
            $item->translateOrNew($locale)->author = $request->get('author_' . $locale);
        }

        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'blogs');
        }



        $item->save();

        $imgsIds = $item->photos->pluck('id')->toArray();
        $newImgsIds = ($request->has('oldImages'))? $request->oldImages:[];
        $diff = array_diff($imgsIds,$newImgsIds);
        BlogGallery::whereIn('id',$diff)->delete();

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
                        Image::make($one)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/blogs/$newName");
                    }

                    $item_image= new BlogGallery();
                    $item_image->image = $newName;
                    $item_image->blog_id = $item->id;
                    $item_image->save();
                }
            }
        }


        return redirect()->route($this->indexRoute)->with('status', __('cp.update'));
    }


    public function destroy($id)
    {
        $item = TargetModel::query()->findOrFail($id);
        if ($item) {
            TargetModel::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }




}
