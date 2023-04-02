<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\SliderImages as TargetModel;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

use Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->baseFolder = 'admin.sliders';
        $this->indexRoute = 'admin.sliders.index';
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
            'section' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();

        $item->section = $request->section;

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
        }

        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'sliders');
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
        return view($this->baseFolder . '.edit', [
            'item' => $item,
        ]);
    }


    public function update(Request $request, $id)
    {

        $roles = [
            'section' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);
        $item->section = $request->section;

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
        }

        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'sliders');
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
