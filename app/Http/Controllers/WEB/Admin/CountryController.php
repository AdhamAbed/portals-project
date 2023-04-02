<?php

namespace App\Http\Controllers\WEB\Admin;
use App\Models\Country;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\JobTitle;
use App\Models\Language;
use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class CountryController extends Controller
{
    
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share([
            'locales' => $this->locales,
            'settings' => $this->settings,

        ]);
    }



    public function index()
    {
       $items  = Country::latest()->paginate($this->settings->rows_pagination_count);       
       return view('admin.countries.home', compact('items'));
    }



    public function create()
    {
        return view('admin.countries.create');
    }



    public function store(Request $request)
    {
        $locales = Language::all()->pluck('lang');

        $country = new Country();
        
        foreach ($locales as $locale)
        {
            $country->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }
    
        $country->save();
        return redirect()->route('admin.countries.index')->with('status', __('cp.create'));

    }


    public function show($id)
    {
        $item=Car::all();
    }
    

    public function edit($id)
    {
        $item = Country::findOrFail($id);
        return view('admin.countries.edit', compact('item'));
    }



    public function update(Request $request, $id)
    {
        $locales = Language::all()->pluck('lang');
 
        $item = Country::findOrFail($id);
        
        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }        

        $item->save();

        return redirect()->route('admin.countries.index')->with('status', __('cp.update'));

    }


    

    public function destroy($id)
    {
        $item = Country::query()->findOrFail($id);
        if ($item) {
            Country::query()->where('id', $id)->delete();

            return "success";
        }
        return "fail";
    }

}
