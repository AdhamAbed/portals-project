<?php

namespace App\Http\Controllers\WEB\Admin;

use App\User;
use App\Models\Language;

use App\Models\Setting;
use App\Models\CourseCategory as TargetModel;
use App\Models\Photo;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;

class CourseCategoryController extends Controller
{


    public function __construct()
    {
        $this->baseFolder = 'admin.courses_categories';
        $this->indexRoute = 'admin.courses_categories.index';
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

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();
        $item->color = $request->color;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('image')) {
            $image= $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/courses_categories/".$file_name);
            $item->image = $file_name;
        }

        $item->save();

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

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);
        $item->color = $request->color;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/courses_categories/".$file_name);
            $item->image = $file_name;
        }

        $item->save();

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
