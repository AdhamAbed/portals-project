<?php

namespace App\Http\Controllers\WEB\Admin;


use App\User;
use App\Models\CityTranslation;

use App\Models\Coupon;
use App\Models\CountryTranslation;

use App\Models\Language;
use App\Models\Permission;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class CouponController extends Controller
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



    public function index(Request $request)
    {

        $items = Coupon::query();
        $items = $items->latest()->paginate($this->settings->rows_pagination_count);

       return view('admin.coupons.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.coupons.create');
    }



    public function store(Request $request)
    {
        $locales = Language::all()->pluck('lang');
        
        $item = new Coupon();
        $item->name = $request->name;
        $item->start = $request->start;
        $item->end = $request->end;
        $item->discount = $request->discount;
        $item->save();
        return redirect()->route('admin.coupons.index')->with('status', __('cp.create'));
    }


    

    public function edit($id)
    {
        $item = Coupon::findOrFail($id);
        return view('admin.coupons.edit', ['item' => $item]);
    }



    public function update(Request $request, $id)
    {
        $locales = Language::all()->pluck('lang');
 
        $item = Coupon::query()->findOrFail($id);
        $item->name = $request->name;
        $item->start = $request->start;
        $item->end = $request->end;
        $item->discount = $request->discount;
        
        $item->save();
        return redirect()->route('admin.coupons.index')->with('status', __('cp.update'));
    }


    

    public function destroy($id)
    {
        $item = Coupon::query()->findOrFail($id);
        if ($item) {
            Coupon::query()->where('id', $id)->delete();
            return redirect()->action('WEB\Admin\CouponController@index')->with('status', __('cp.deleteDone'));
        }
        return "fail";
    }


}
