<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Role;
use Modules\Admin\Entities\AdminUser;
use Modules\Admin\Entities\Permission;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function roles()
    {  
        $roles = Role::orderBy('id', 'desc')->get();

        return view('admin::roles.list', compact('roles'));
    }

    
    public function roleList(Request $request)
    {
      
        $roles = (new Role())->listRole($request);
        echo json_encode($roles);
    }
    public function addRole()
    {
        $permissions = Permission::all();
        return view('admin::roles.add', compact('permissions'));
    }
    public function editRole($id)
    {
        $role = Role::where(['id' => decrypt($id)])->first();
        $permissions = Permission::all();
        return view('admin::roles.edit', compact('role', 'permissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'     =>  'required',
            'perms' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (empty($value)) {
                        $fail('The '.$attribute.' field is required.');
                    }
                },
            ],
        ]);
    
        $count = Role::where('title', $request->name)->count();
    
        if ($count > 0) {
            return redirect('admin/roles')->with('error', 'Already Added.');
        } else {
            $role = new Role;
            $role->title = $request->name;
            $role->is_active = $request->status;
            $role->generateSlug();
            $role->save();
    
            $role->permissions()->sync($request->perms);
    
            return redirect('admin/roles')->with('status', 'Role Added Successfully.');
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'perms' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (empty($value)) {
                        $fail('The '.$attribute.' field is required.');
                    }
                },
            ],
        ]);
        $role = Role::where(['id' => $request->id])->first();
        $role->title    =  $request->name; 
        $role->is_active    =  $request->status; 
        $role->save();
        if($request->perms == null || count($request->perms) > 0)
            $role->permissions()->sync($request->perms);
        return redirect('admin/roles')->with('status', 'Role Updated Successfully.');
    }
    public function delete(Request $request)
    {
        $user= AdminUser::where('role_id',$request->id)->first();
        if(!empty($user))
        {
            return response()->json(['status' => 'error', 'message' => 'Delete Admin User First']);
        }
        else{
            $user=(new Role())->deleteRole($request->id);
            return response(['status' => 'success', 'title' => 'Roles Deleted Successfully !']);
        }
    }
    public function statusUpdate(Request $request)
    {
      
            $statusUpdate=(new Role())->rolestatusUpdate($request);
         
        return response(['status' => 'success']);
    }
}
