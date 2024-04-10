<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\AdminUser;
use Modules\Admin\Entities\Role;
use Modules\Admin\Entities\RolePermission;
use SiteHelper;
use Auth;
use Modules\Admin\Http\Requests\AdminUserStoreRequest;
use Modules\Admin\Http\Requests\AdminUserUpdateRequest;
use Session;
use Carbon\Carbon;

class AdminUserController extends Controller
{
    public function index()
    {
       return view('admin::index');
    }
    public function dashboard()
    {
         return view('admin::dashboard');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email', 
            'password' => 'required',
        ]);
        $user = AdminUser::where(['email'=>$request->email,'status'=>1])->first();
        if($user == null) {
            return redirect('/admin/login')->with('status','Invalid Credentials');
        } else {
            
            $credentials = $request->only('email', 'password');
             if (Auth::guard('admin')->attempt($credentials)) {
                $user = Auth::guard('admin')->user();

                $permissions = RolePermission::where('role_id', Auth::guard('admin')->user()->role_id)->get();
               
                $permArray = [];
                foreach ($permissions as $perm) {
                    $permArray[] = $perm->permission_id;
                }
                Session::put('permArray', $permArray);

                return redirect('admin/dashboard');
            }
            else {
                $notification = array(
                    'message' => 'Enter valid credentials and try again',
                    'alert-type' => 'ErrorS'
                );
                return redirect('/admin/login')->with('status','Invalid Credentials');
            }
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function list()                                                //admin Userlist
    {
        return view('admin::adminuser.list');      
    }

    public function adminList(Request $request)                           //admin Userlist
    {
       
     
        $adminUser = (new AdminUser())->listAdminUser($request);
      
        
        echo json_encode($adminUser);                   
    }


    public function adminView()                                         //admin View Create page
    {
        $getRoles=Role::where('is_active',1)->get();
        return view('admin::adminuser.add',compact('getRoles'));
    }
   
    public function adminStore(AdminUserStoreRequest $request)                              //admin Store New User 
    {
        $results = (new AdminUser())->storeAdmin($request);
        return redirect('admin/adminuser')->with('status','Added Successfully');
    }
    public function adminEdit(Request $request)
    {
      
        $id =   decrypt($request->id);
        $data=AdminUser::where('id',$id)->first();
        $getRoles=Role::where('is_active',1)->get();
       return view('admin::adminuser/edit',compact('data','getRoles'));
        
    }
    public function adminUpdate(AdminUserUpdateRequest $request)
	{
        $adminUserUpdate = (new AdminUser())->adminUserUpdate($request);
        return redirect('admin/adminuser')->with('status','Updated Successfully');
    }
    public function adminDelete(Request $request)
    {      
        $adminDelete   =   (new AdminUser())->adminDelete($request->id);
    }
    public function adminStatusUpdate(Request $request)
    {
        $adminStatusUpdate=(new AdminUser())->adminStatusUpdate($request);
        return response(['status' => 'success']);
    }
}
