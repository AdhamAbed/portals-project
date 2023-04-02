<?php

namespace App\Http\Controllers\WEB\Admin;

use App\User;
use App\Models\Language;

use App\Models\Setting;
use App\Models\ConsultationCategory as TargetModel;
use App\Models\Photo;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;

class ConsultationCategoryController extends Controller
{


    public function __construct()
    {
        $this->baseFolder = 'admin.consultations_categories';
        $this->indexRoute = 'admin.consultations_categories.index';
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
            $roles['description_' . $locale] = 'required';
            $roles['sub_description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $item->translateOrNew($locale)->sub_description = $request->get('sub_description_' . $locale);
        }


        if(isset($request->image)){
            $item->image = uploadImage($request->image, 'consultations_categories');
        }

        if(isset($request->header_image)){
            $item->header_image = uploadImage($request->header_image, 'consultations_categories');
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
//        dd($item);
        return view($this->baseFolder . '.edit', ['item' => $item]);
    }




    public function update(Request $request, $id)
    {

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
            $roles['sub_description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $item->translateOrNew($locale)->sub_description = $request->get('sub_description_' . $locale);
        }


        if(isset($request->image)){
            $item->image = uploadImage($request->image, 'consultations_categories');
        }
        if(isset($request->header_image)){
            $item->header_image = uploadImage($request->header_image, 'consultations_categories');
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
