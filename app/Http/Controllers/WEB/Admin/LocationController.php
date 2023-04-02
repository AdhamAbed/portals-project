<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location as TargetModel;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->baseFolder = 'admin.locations';
        $this->indexRoute = 'admin.locations.index';
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
            $roles['country_name_' . $locale] = 'required';
            $roles['city_name_' . $locale] = 'required';
//            $roles['description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();
        $item->status = $request->status == 'on' ? 'active' : 'not_active';
//        $data['status'] = $request['status'] == 'on' ? 'active' : 'inactive';
        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
            $item->translateOrNew($locale)->country_name = $request->get('country_name_' . $locale);
            $item->translateOrNew($locale)->city_name = $request->get('city_name_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);

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
            $roles['country_name_' . $locale] = 'required';
            $roles['city_name_' . $locale] = 'required';
//            $roles['description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);
        $item->status = $request->status == 'on' ? 'active' : 'not_active';

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
            $item->translateOrNew($locale)->country_name = $request->get('country_name_' . $locale);
            $item->translateOrNew($locale)->city_name = $request->get('city_name_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);

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
