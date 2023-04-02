<?php

namespace App\Http\Controllers\WEB\Admin;

use App\User;
use App\User as TargetModel;

use App\Models\Order;
use App\Models\Setting;

use Carbon\Carbon;

use Dotenv\Exception\ValidationException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;
use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{


    public function __construct()
    {
        $this->baseFolder = 'admin.users';
        $this->indexRoute = 'admin.users.index';
        $this->settings = Setting::query()->first();
        view()->share(['settings' => $this->settings]);
    }



    public function index(Request $request)
    {
        $items = TargetModel::query();
        if ($request->has('email')) {
            if ($request->get('email') != null)
                $items->where('email', 'like', '%' . $request->get('email') . '%');
        }

        if ($request->has('mobile')) {
            if ($request->get('mobile') != null)
                $items->where('mobile', 'like', '%' . $request->get('mobile') . '%');
        }


        $items = $items->where('type', 'user')->latest()->paginate($this->settings->rows_pagination_count);
        return view($this->baseFolder . '.home', ['items' => $items]);
    }



    public function create()
    {
        return view($this->baseFolder  . '.create');
    }




    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:admins|digits_between:8,16',
            'email'=>'required|email|unique:admins',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $item = new TargetModel();
        $item->name = $request->name;
        $item->mobile = $request->mobile;
        $item->email = $request->email;
        // $item->address = $request->address;
        $item->password = bcrypt($request->password);
        // $item->latitude = $request->lat;
        // $item->longitude = $request->lng;
        $item->status = 'active';
        $item->type = 'user';

        if(isset($request->image_profile)){
            $item->image = uploadImage($request->image_profile, 'users"');
        }

        $item->save();
        return redirect()->route($this->indexRoute)->with('status', __('cp.create'));
    }



    public function edit($id)
    {
        $item = TargetModel::findOrFail($id);
        return view($this->baseFolder . '.edit',['item' => $item]);
    }


    public function show($id)
    {
        $item = TargetModel::findOrFail($id);
        return view($this->baseFolder . '.show',['item' => $item]);
    }


    public function update(Request $request, $id)
    {
        $item = TargetModel::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|digits_between:8,116|unique:admins,mobile,'.$item->id,
            // 'email'=>'required|unique:admins,email,'.$item->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item->name = $request->name;
        $item->mobile = $request->mobile;
        // $item->email = $request->email;
        // $item->address = $request->address;

        // if($request->lat){
        //     $item->latitude = $request->lat;
        // }

        // if($request->lng){
        //     $item->longitude = $request->lng;
        // }

       if(isset($request->image)){
            $item->image = uploadImage($request->image, 'users');
        }

        $item->save();


        return redirect()->route($this->indexRoute)->with('status', __('cp.update'));
    }


    public function edit_password(Request $request, $id)
    {
        $item = TargetModel::findOrFail($id);
        return view($this->baseFolder . '.edit_password',['item' => $item]);
    }




    public function update_password(Request $request, $id)
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
        $user = TargetModel::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

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
