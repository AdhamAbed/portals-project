<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Category;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index()
    {
        $items  = Category::latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.categories.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.categories.create');
    }



    public function store(Request $request)
    {
        $roles = [
            // 'logo' => 'required|image|mimes:jpeg,jpg,png',
        ];

        $locales = Language::all()->pluck('lang');
        
        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }
        
        $this->validate($request, $roles);

        $item = new Category();
        $item->color = $request->color;
        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
        }
        
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $extention = $logo->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($logo)->save("uploads/categories/".$file_name);
            $item->image = $file_name;
        }        

        $item->save();
        return redirect()->back()->with('status', __('cp.create'));

    }


    public function edit($id)
    {
        $item = Category::findOrFail($id);
        return view('admin.categories.edit', ['item' => $item]);
    }




    public function update(Request $request, $id)
    {

        $locales = Language::all()->pluck('lang');
        
        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }
        
        $this->validate($request, $roles);

        $item = Category::query()->findOrFail($id);
        $item->color = $request->color;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/categories/".$file_name);
            $item->image = $file_name;
        }

        $item->save();

        return redirect()->back()->with('status', __('cp.update'));
    }
    

    public function destroy($id)
    {
        $item = Category::query()->findOrFail($id);
        if ($item) {
            Category::query()->where('id', $id)->delete();

            return "success";
        }
        return "fail";
    }

}
