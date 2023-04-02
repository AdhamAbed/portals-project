<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultant as TargetModel;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function __construct()
    {
        $this->baseFolder = 'admin.consultants';
        $this->indexRoute = 'admin.consultants.index';
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
            // 'logo' => 'required|image|mimes:jpeg,jpg,png',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();

        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'consultants');
        }
        $item->status = 'active';

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
            $item->translateOrNew($locale)->description = $request->get('description_' . $locale);
        }


        $item->save();
        return redirect()->back()->with('status', __('cp.create'));

    }




    public function edit($id)
    {
        $item = TargetModel::findOrFail($id);
        return view($this->baseFolder . '.edit', ['item' => $item]);
    }




    public function update(Request $request, $id)
    {

        $roles = [
            // 'color' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }

        $this->validate($request, $roles);



        $item = TargetModel::query()->findOrFail($id);
        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'consultants');
        }

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
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
