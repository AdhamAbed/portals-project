<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use App\Models\socialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index()
    {
        $items  = socialMedia::latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.social_media.home', ['items' => $items]);
    }



    public function create()
    {
        return view('admin.social_media.create');
    }



    public function store(Request $request)
    {
        $roles = [
            'name' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ];

        $this->validate($request, $roles);

        $item = new socialMedia();
        $item->name = $request->get('name');
        $item->url = $request->get('url');
        $item->icon = $request->get('icon');



        $item->save();
        return redirect()->back()->with('status', __('cp.create'));

    }


    public function edit($id)
    {
        $item = socialMedia::findOrFail($id);
        return view('admin.social_media.edit', ['item' => $item]);
    }




    public function update(Request $request, $id)
    {
        $roles = [
             'name' => 'required',
             'icon' => 'required',
             'url' => 'required',
        ];



        $this->validate($request, $roles);

        $item = socialMedia::query()->findOrFail($id);
        $item->name = $request->get('name');
        $item->url = $request->get('url');
        $item->icon = $request->get('icon');


        $item->save();

        return redirect()->back()->with('status', __('cp.update'));
    }


    public function destroy($id)
    {
        $item = socialMedia::query()->findOrFail($id);
        if ($item) {
            socialMedia::query()->where('id', $id)->delete();

            return "success";
        }
        return "fail";
    }

}
//
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('122', '0', 'مواقع التواصل الاجتماعي', 'admin.socials_media.index', '<i class=\"fas fa-bullseye\"></i>', '5', '1', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('123', '122', 'إضافة', 'admin.socials_media.create', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('124', '122', 'تعديل', 'admin.socials_media.edit', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('125', '122', 'حذف', 'admin.socials_media.destroy', NULL, '0', '0', current_timestamp(), NULL, NULL);
