<?php

namespace App\Http\Controllers\WEB\Admin;

use App\User;
use App\Models\Language;

use App\Models\Setting;
use App\Models\Donor as TargetModel;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;

class DonorController extends Controller
{

  
    public function __construct()
    {
        $this->baseFolder = 'admin.donors';
        $this->indexRoute = 'admin.donors.index';
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
        $item->url = $request->url;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->summary = $request->get('summary_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if(isset($request->image)){
            $item->logo = uploadImage($request->image, 'donors');    
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
        $item->url = $request->url;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->summary = $request->get('summary_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if(isset($request->image)){
            $item->logo = uploadImage($request->image, 'donors');    
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
