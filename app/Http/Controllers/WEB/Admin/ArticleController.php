<?php

namespace App\Http\Controllers\WEB\Admin;

use App\User;
use App\Models\Language;

use App\Models\Setting;
use App\Models\Article as TargetModel;
use App\Models\Photo;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;

class ArticleController extends Controller
{

  
    public function __construct()
    {
        $this->baseFolder = 'admin.articles';
        $this->indexRoute = 'admin.articles.index';
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
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['summary_' . $locale] = 'required';
            $roles['details_' . $locale] = 'required';
        }

        $this->validate($request, $roles);
        
        $item = new TargetModel(); 
        $item->share_post = $request->share_post;
        $item->accept_comments = $request->accept_comments;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->summary = $request->get('summary_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
            $item->translateOrNew($locale)->writer = $request->get('writer_' . $locale);
            $item->translateOrNew($locale)->keywords = $request->get('keywords_' . $locale);
        }

        if(isset($request->image)){
            $item->image = uploadImage($request->image, 'articles');    
        }
        
        $item->save();
        
        if($request->has('filename')  && !empty($request->filename)){
           foreach($request->filename as $one)
           {
               if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
                    $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
                    $name = rand(1000000, 9999999) . "_" .str_random(8) . "" .  "" . time() . "" . rand(1000000, 9999999);
                    $newName = $name. ".jpg";
                    Image::make($one)->save("uploads/photos/$newName");
                    $item_image= new Photo();
                    $item_image->file = $newName;
                    $item_image->attachmentable_id = $item->id;
                    $item_image->attachmentable_type = 'App\Models\Article';
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
        return view($this->baseFolder . '.edit', ['item' => $item]);
    }




    public function update(Request $request, $id)
    {

        $roles = [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['summary_' . $locale] = 'required';
            $roles['details_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);
        $item->share_post = $request->share_post;
        $item->accept_comments = $request->accept_comments;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->summary = $request->get('summary_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
            $item->translateOrNew($locale)->writer = $request->get('writer_' . $locale);
            $item->translateOrNew($locale)->keywords = $request->get('keywords_' . $locale);
        }

        if(isset($request->image)){
            $item->image = uploadImage($request->image, 'articles');    
        }
        
        
        $item->save();
        
        $imgsIds = $item->photos->pluck('id')->toArray();
        $newImgsIds = ($request->has('oldImages'))? $request->oldImages:[];
        $diff = array_diff($imgsIds,$newImgsIds);
        Photo::whereIn('id',$diff)->delete();

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
                        Image::make($one)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/photos/$newName");
                    }
                    
                    $item_image= new Photo();
                    $item_image->attachmentable_id = $item->id;
                    $item_image->file = $newName;
                    $item_image->attachmentable_type =  "App\\Models\\Article";
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
