<?php

namespace App\Http\Controllers\WEB\Admin;


use App\Admin;
use App\User;

use App\Models\City;
use App\Models\Setting;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;


use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;

use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Image;

class AdminController extends Controller
{

    public function image_extensions(){
        return array('jpg','png','jpeg','gif','bmp','pdf');
    }


    public function __construct()
    {
        $this->settings = Setting::query()->first();
        view()->share(['settings' => $this->settings]);
    }


    public function index(Request $request)
    {

        $items = Admin::query();

        // if ($request->has('email')) {
        //     if ($request->get('email') != null)
        //         $items->where('email', 'like', '%' . $request->get('email') . '%');
        // }

        // if ($request->has('mobile')) {
        //     if ($request->get('mobile') != null)
        //         $items->where('mobile', 'like', '%' . $request->get('mobile') . '%');
        // }

        $items = $items->where('id','>',1)->where('type', 'admin')->orderBy('id', 'desc');
        return view('admin.admin.home', ['items' => $items->get()]);

    }


    public function create()
    {
        $users = Admin::all();
        $roles = Role::active()->get();
        return view('admin.admin.create', ['users' => $users, 'roles' => $roles]);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password|min:6',
            'mobile'=>'required|digits_between:8,12',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $newAdmin = new Admin();
        $newAdmin->type = 'admin';
        $newAdmin->name = $request->name;
        $newAdmin->role_id = $request->role_id;
        $newAdmin->email = $request->email;
        $newAdmin->password = bcrypt($request->password);
        $newAdmin->mobile = $request->mobile;
        $newAdmin->save();
    
        return redirect()->route('admin.admins.all')->with('status', __('cp.create'));

    }



    public function edit($id)
    {
        $item = Admin::findOrFail($id);
        $roles = Role::active()->get();
        return view('admin.admin.edit', ['item' => $item, 'roles' => $roles]);
    }



    public function update(Request $request, $id)
    {

        $newAdmin = Admin::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'=>'required|string',
            'mobile'=>'required|digits_between:8,12|unique:admins,mobile,'.$newAdmin->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $check = Admin::where('email',$request->email)->where('id','<>',$id)->first();
        if($check){
            $validator=[__('api.whoops')];
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $newAdmin->name = $request->name;
        $newAdmin->role_id = $request->role_id;
        $newAdmin->mobile = $request->mobile;
        $newAdmin->save();
        return redirect()->route('admin.admins.all')->with('status', __('cp.update'));

    }



    public function edit_password(Request $request, $id)
    {
        $item = Admin::findOrFail($id);
        return view('admin.admin.edit_password',['item'=>$item]);
    }


    public function update_password (Request $request, $id)
    {
        $users_rules=array(
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password|min:6',
        );
        $users_validation=Validator::make($request->all(), $users_rules);

        if($users_validation->fails())
        {
            return redirect()->back()->withErrors($users_validation)->withInput();
        }
        $user = Admin::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.admins.all')->with('status', __('cp.update'));
    }


    public function destroy($id)
    {
        $item = Admin::query()->findOrFail($id);
        if ($item && $item->type != 1) {
            Admin::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }


}
