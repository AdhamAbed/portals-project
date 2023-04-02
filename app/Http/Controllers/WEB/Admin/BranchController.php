<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch as TargetModel;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->baseFolder = 'admin.branches';
        $this->indexRoute = 'admin.branches.index';
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
        $roles['email'] = 'required|email';
        $roles['mobile'] = 'required';
        $roles['fax'] = 'required';
        $roles['site_url'] = 'required';

        $this->validate($request, $roles);

        $item = new TargetModel();
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        $item->fax = $request->fax;
        $item->site_url = $request->site_url;
        $item->status = $request->status == 'on' ? 'active' : 'not_active';

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);

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
        $roles['email'] = 'required|email';
        $roles['mobile'] = 'required';
        $roles['fax'] = 'required';
        $roles['site_url'] = 'required';

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        $item->fax = $request->fax;
        $item->site_url = $request->site_url;
        $item->status = $request->status == 'on' ? 'active' : 'not_active';


        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);

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
