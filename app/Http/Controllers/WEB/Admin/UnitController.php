<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Unit as TargetModel;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function __construct()
    {
        $this->baseFolder = 'admin.units';
        $this->indexRoute = 'admin.units.index';
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
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();
        $item->course_id = $request->course_id;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        $item->save();

        return redirect()->route('admin.units.index', ['id' => $request->course_id])->with('status', __('cp.create'));
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
            // 'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        $item->save();

        return redirect()->route('admin.units.index', ['id' => $item->course_id])->with('status', __('cp.update'));
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
