<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Language;
use App\Models\Setting;
use App\Models\CourseStatistics as TargetModel;
use Illuminate\Http\Request;
use Imagick;


class CourseStatisticsController extends Controller
{
    public function __construct()
    {
        $this->baseFolder = 'admin.course_statistics';
        $this->indexRoute = 'admin.course_statistics.index';
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }



    public function index()
    {
        $items = TargetModel::query();
        $items = $items->where('course_id', $_GET['id'])->latest('id')->paginate(20);
        $course = Course::where('id', $_GET['id'])->first();
        return view($this->baseFolder . '.home', ['items' => $items, 'course' => $course]);
    }



    public function create()
    {
        // return $_GET['id'];
        return view($this->baseFolder . '.create', ['course_id' => $_GET['id'] ]);
    }




    public function store(Request $request)
    {

        $roles = [
            'course_id' => 'required',
            'count' => 'required',
//            'image' => 'required|image|mimes:svg|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();
        $item->course_id = $request->course_id;
        $item->count = $request->count;

        if (isset($request->image)) {
            $image = $request->file('image');
            $item->image = uploadImage($request->image, 'courses/statistics');
//
//            $imagick = new Imagick();
//            $imagick->pingImage($image->getPathname());
//            $imageData = $imagick->getImageBlob();
//            $item->image = $imageData;
        }

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
        }

        $item->save();

        return redirect()->route('admin.course_statistics.index', ['id' => $request->course_id])->with('status', __('cp.create'));
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
            'count' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
//            'image' => 'required|image|mimes:svg|max:2048',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);

        $item->count = $request->count;
        if (isset($request->image)) {
             if (isset($request->image)) {
            $image = $request->file('image');
            $item->image = uploadImage($request->image, 'courses/statistics');

//            $imagick = new Imagick();
////            $imagick->pingImage($image->getPathname());
////            $imageData = $imagick->getImageBlob();
//            $item->image = $imagick->pingImage($image);
        }
        }

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
        }

        $item->save();

        return redirect()->route('admin.course_statistics.index', ['id' => $item->course_id])->with('status', __('cp.update'));
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
