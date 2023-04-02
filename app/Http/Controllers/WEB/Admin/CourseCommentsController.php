<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\CourseComments as TargetModel;
use Image;

class CourseCommentsController extends Controller
{

    public function __construct()
    {
        $this->baseFolder = 'admin.courseComments';
        $this->indexRoute = 'admin.courseComments.index';
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index()
    {
        $items  = TargetModel::latest()->paginate($this->settings->rows_pagination_count);
        return view($this->baseFolder.'.home', ['items' => $items]);
    }



    public function create()
    {
        $courses = Course::active()->get();
        return view($this->baseFolder.'.create' , ['courses' => $courses]);
    }



    public function store(Request $request)
    {
        $roles = [
//             'image' => 'required',
             'user_name' => 'required',
             'user_specialization' => 'required',
             'comment' => 'required',
             'rate' => 'required',
        ];


        $this->validate($request, $roles);

        $item = new TargetModel();
        $item->course_id = $request->course_id;
        $item->user_name = $request->user_name;
        $item->user_specialization = $request->user_specialization;
        $item->comment = $request->comment;
        $item->rate = $request->rate;
        $item->file_type = $request->file_type;



        if (isset($request->image) && $request->file_type == 'image') {
            $item->file = uploadImage($request->image, 'courses/comments');
        }elseif (isset($request->video) && $request->file_type == 'video'){
            $item->file = uploadFile($request->video, 'courses/comments');
        }

        $item->save();
        return redirect()->back()->with('status', __('cp.create'));

    }


    public function edit($id)
    {
        $item = TargetModel::findOrFail($id);
        $courses = Course::active()->get();
        return view($this->baseFolder.'.edit', ['item' => $item, 'courses' => $courses ]);
    }




    public function update(Request $request, $id)
    {

        $roles = [
//             'image' => 'required',
            'user_name' => 'required',
            'user_specialization' => 'required',
            'comment' => 'required',
            'rate' => 'required',
        ];


        $this->validate($request, $roles);
        $item = TargetModel::query()->findOrFail($id);

        $item->course_id = $request->course_id;
        $item->user_name = $request->user_name;
        $item->user_specialization = $request->user_specialization;
        $item->comment = $request->comment;
        $item->rate = $request->rate;
        $item->file_type = $request->file_type;


        if (isset($request->image) && $request->file_type == 'image') {
            $item->file = uploadImage($request->image, 'courses/comments');
        }elseif (isset($request->video) && $request->file_type == 'video'){
            $item->file = uploadFile($request->video, 'courses/comments');
        }

        $item->save();

        return redirect()->back()->with('status', __('cp.update'));
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

//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('173', '0', 'Trainers', 'admin.trainers.index', '<i class=\"fas fa-bullseye\"></i>', '5', '1', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('174', '173', 'add', 'admin.trainers.create', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('175', '173', 'eid', 'admin.trainers.edit', NULL, '0', '0', current_timestamp(), NULL, NULL);
//INSERT INTO `permissions` (`id`, `parent_id`, `name`, `route_name`, `icon`, `reorder_by`, `in_sidebar`, `created_at`, `updated_at`, `deleted_at`) VALUES ('176', '173', 'delete', 'admin.trainers.destroy', NULL, '0', '0', current_timestamp(), NULL, NULL);
//
