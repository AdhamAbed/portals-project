<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Setting;
use App\Models\Language;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }


    public function index(Request $request)
    {
        $items = Role::query()->get();
        return view('admin.roles.home', ['items' => $items]);
    }


    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create', ['permissions' => $permissions]);
    }



    public function store(Request $request)
    {
        
        $item = New Role();
        $item->name = $request->name;
        $item->save();
        
        if(count($request->permissions) > 0){
            foreach($request->permissions as $one){
                $roles_permissions = new RolePermission();
                $roles_permissions->role_id = $item->id;
                $roles_permissions->permission_id = $one;
                $roles_permissions->save();
            }
        }
        
        return redirect()->route('admin.roles.index')->with('status', __('cp.create'));
    }
    

    

    public function edit($id)
    {
        $item = Role::findOrFail($id);
        $permissions = Permission::orderBy('reorder_by', 'asc')->get();
        return view('admin.roles.edit', ['item' => $item, 'permissions' => $permissions]);
    }
    

    
    public function update(Request $request, $id)
    {

        $item = Role::findOrFail($id);
        $item->name = $request->name;
        $item->save();
        
        RolePermission::where('role_id', $id)->delete();
        
        if(count($request->permissions) > 0){
            foreach($request->permissions as $one){
                $roles_permissions = new RolePermission();
                $roles_permissions->role_id = $item->id;
                $roles_permissions->permission_id = $one;
                $roles_permissions->save();
            }
        }
          
        return redirect()->route('admin.roles.index')->with('status', __('cp.update'));

    }
    
    

    public function destroy($id)
    {
        $item = Role::query()->findOrFail($id);
        if ($item) {
            Role::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }


}
