<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ConsultingMail;
use App\Models\Language;
use App\Models\PrivateCoursesRequest as TargetModel;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PrivateCoursesRequestController extends Controller
{
    public function __construct()
    {
        $this->baseFolder = 'admin.private_courses_requests';
        $this->indexRoute = 'admin.private_courses_requests.index';
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
        $item->status = $request->status;
        $item->replay = $request->replay;
//        $item->answer_by = $request->answer_by;

        Mail::send(new ConsultingMail($item , $request->replay));
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
