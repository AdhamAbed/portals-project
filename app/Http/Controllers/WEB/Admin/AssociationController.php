<?php

namespace App\Http\Controllers\WEB\Admin;

use App\User;
use App\Admin as TargetModel;
use App\Models\Language;

use App\Models\Setting;
use App\Models\Country;
use App\Models\City;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;

class AssociationController extends Controller
{

  
    public function __construct()
    {
        $this->baseFolder = 'admin.associations';
        $this->indexRoute = 'admin.associations.index';
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }
    
    
    
    public function index(Request $request)
    {
        $items = TargetModel::query();
        $items = $items->where('type', 'association')->latest()->paginate(20);
        return view($this->baseFolder . '.home', ['items' => $items]);
    }
    

   
    public function create()
    {
        $countries = Country::active()->get();
        return view($this->baseFolder . '.create', ['countries' => $countries]);
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
        $item->type = 'association';
        $item->url = $request->url;
        $item->country_id = $request->country_id;
        $item->city_id = $request->city_id;
        $item->mobile = $request->mobile;
        $item->email = $request->email;
        

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->summary = $request->get('summary_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if(isset($request->image)){
            $item->image = uploadImage($request->image, 'admins');    
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
        $countries = Country::active()->get();
        $cities = City::active()->where('country_id', $item->country_id)->get();

        return view($this->baseFolder . '.edit', ['item' => $item, 'countries' => $countries, 'cities' => $cities]);
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
        $item->type = 'association';
        $item->url = $request->url;
        $item->country_id = $request->country_id;
        $item->city_id = $request->city_id;
        $item->mobile = $request->mobile;
        $item->email = $request->email;
        
        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->summary = $request->get('summary_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if(isset($request->image)){
            $item->image = uploadImage($request->image, 'admins');    
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
