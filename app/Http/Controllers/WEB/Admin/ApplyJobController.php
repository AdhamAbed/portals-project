<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ConsultingMail;
use App\Models\Language;
use App\Models\Setting;
use App\Models\applyJob as TargetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplyJobController extends Controller
{
    public function __construct()
    {
        $this->baseFolder = 'admin.applyJobs';
        $this->indexRoute = 'admin.apply_jobs.index';
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }



    public function index(Request $request)
    {
        $items = TargetModel::query();
        $items = $items->latest()->paginate(20);
        return view($this->baseFolder . '.home', ['items' => $items]);
    }



    public function create()
    {
        return view($this->baseFolder . '.create');
    }



    public function store(Request $request)
    {

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }


        if(isset($request->image)){
            $item->image = uploadImage($request->image, 'consultations_categories');
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
        $item->update(['read' => 1]);
        return view($this->baseFolder . '.edit', ['item' => $item]);
    }




    public function update(Request $request, $id)
    {

        $locales = Language::all()->pluck('lang');


        $item = TargetModel::query()->findOrFail($id);
        $item->answer = $request->answer;
        $item->answer_by = $request->answer_by;

        Mail::send(new ConsultingMail($item , $request->answer));
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
