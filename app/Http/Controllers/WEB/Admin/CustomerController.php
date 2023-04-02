<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

use Image;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index()
    {
        $items  = Customer::latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.customers.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.customers.create');
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

        $item = new Customer();

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $extention = $logo->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($logo)->save("uploads/customers/".$file_name);
            $item->image = $file_name;
        }

        $item->save();
        return redirect()->back()->with('status', __('cp.create'));

    }


    public function edit($id)
    {
        $item = Customer::findOrFail($id);
        return view('admin.customers.edit', ['item' => $item]);
    }




    public function update(Request $request, $id)
    {

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = Customer::query()->findOrFail($id);

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/customers/".$file_name);
            $item->image = $file_name;
        }

        $item->save();

        return redirect()->back()->with('status', __('cp.update'));
    }


    public function destroy($id)
    {
        $item = Customer::query()->findOrFail($id);
        if ($item) {
            Customer::query()->where('id', $id)->delete();

            return "success";
        }
        return "fail";
    }

}

//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('139', '0', 'مواقع التدريب', 'admin.locations.index', '<i class=\"fas fa-bullseye\"></i>', '5', '1', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('140', '139', 'إضافة', 'admin.locations.create', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('141', '139', 'تعديل', 'admin.locations.edit', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('142', '139', 'عرض', 'admin.locations.show', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('143', '139', 'حذف', 'admin.locations.destroy', NULL, '0', '0', current_timestamp(), NULL, NULL);
//
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('144', '0', 'جدولة الدورات التدريبية', 'admin.schedule_courses.index', '<i class=\"fas fa-bullseye\"></i>', '5', '1', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('145', '144', 'إضافة', 'admin.schedule_courses.create', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('146', '144', 'تعديل', 'admin.schedule_courses.edit', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('147', '144', 'عرض', 'admin.schedule_courses.show', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('148', '144', 'حذف', 'admin.schedule_courses.destroy', NULL, '0', '0', current_timestamp(), NULL, NULL);


//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('149', '0', 'طلبات الدورات الخاصة', 'admin.private_courses_requests.index', '<i class=\"fas fa-bullseye\"></i>', '5', '1', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('150', '149', 'تعديل', 'admin.private_courses_requests.edit', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('151', '149', 'عرض', 'admin.private_courses_requests.show', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('152', '149', 'حذف', 'admin.private_courses_requests.destroy', NULL, '0', '0', current_timestamp(), NULL, NULL);
