<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Lesson as TargetModel;
use App\Models\Setting;
use App\Models\Unit;
use Illuminate\Http\Request;

class LessonController extends Controller
{


    public function __construct()
    {
        $this->baseFolder = 'admin.lessons';
        $this->indexRoute = 'admin.lessons.index';
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index()
    {
        $items = TargetModel::query();
        $items = $items->where('unit_id', $_GET['id'])->latest('id')->paginate(20);
        $unit = Unit::where('id', $_GET['id'])->first();
        return view($this->baseFolder . '.home', ['items' => $items, 'unit' => $unit ]);
    }



    public function create()
    {
        return view($this->baseFolder . '.create', ['unit_id' => $_GET['id'] ]);
    }




    public function store(Request $request)
    {
        $roles = [
            'unit_id' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();
        // $item->lesson_type = $request->lesson_type;
        $item->unit_id = $request->unit_id;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if(isset($request->file)){
            $item->file = uploadFile($request->file, 'lessons');
        }

        $item->save();

        return redirect()->route('admin.lessons.index', ['id' => $request->unit_id])->with('status', __('cp.create'));
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
        // $item->lesson_type = $request->lesson_type;

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if(isset($request->file)){
            $item->file = uploadFile($request->file, 'lessons');
        }

        $item->save();

        return redirect()->route('admin.lessons.index', ['id' => $item->unit_id])->with('status', __('cp.update'));
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
