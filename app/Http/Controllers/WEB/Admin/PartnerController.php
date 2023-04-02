<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Http\Request;


use Image;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index()
    {
        $items  = Partner::latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.partners.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.partners.create');
    }



    public function store(Request $request)
    {
        $roles = [
            // 'logo' => 'required|image|mimes:jpeg,jpg,png',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new Partner();

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $extention = $logo->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($logo)->save("uploads/partners/".$file_name);
            $item->image = $file_name;
        }

        $item->save();
        return redirect()->back()->with('status', __('cp.create'));

    }


    public function edit($id)
    {
        $item = Partner::findOrFail($id);
        return view('admin.partners.edit', ['item' => $item]);
    }




    public function update(Request $request, $id)
    {

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = Partner::query()->findOrFail($id);

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/partners/".$file_name);
            $item->image = $file_name;
        }

        $item->save();

        return redirect()->back()->with('status', __('cp.update'));
    }


    public function destroy($id)
    {
        $item = Partner::query()->findOrFail($id);
        dd($item);
        if ($item) {
            Partner::query()->where('id', $id)->delete();

            return "success";
        }
        return "fail";
    }

}

//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('134', '0', 'الفروع', 'admin.branches.index', '<i class=\"fas fa-bullseye\"></i>', '6', '1', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('135', '134', 'إضافة', 'admin.branches.create', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('136', '134', 'تعديل', 'admin.branches.edit', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('137', '134', 'عرض', 'admin.branches.show', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('138', '134', 'حذف', 'admin.branches.destroy', NULL, '0', '0', current_timestamp(), NULL, NULL);
