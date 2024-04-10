<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB, Config;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Entities\Role;
use Modules\Admin\Entities\Permission;
use SiteHelper;

class AdminUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name','email','email_verified_at','role_id','password','remember_token','status'];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\AdminUserFactory::new();
    }
    public function getRole()
    {
    	return $this->belongsTo("Modules\Admin\Entities\Role", "role_id");
    }
    function getRoleAdmin(){
        return $this->hasOne("Modules\Admin\Entities\Role",'id', "role_id");
    }
    public function listAdminUser($request)
    {
       
        $search   =   $request->search['value'];
        $type     =   $request->type;
        $sort     =   $request->order;
        $column   =   $sort[0]['column'];
        $order    =   $sort[0]['dir'] == 'asc' ? "ASC" : "DESC" ;
        $admins   =   self::whereNotNull('id')->with('getRoleAdmin');
        if ($search != '') 
        {
            $admins=$admins->where('name', 'LIKE', '%'.$search.'%');
        }
        $total  = $admins->count();
        if ($column == 0) {
            $admins->orderBy('id', $order);
            if ($order == 'ASC') {
                $i = 1;
            }
            else{
                $i = $total;
            }
        } else {
            $admins->orderBy('id', 'desc');
            $i = 1;
        }
        $admins=$admins->take($request->length)->skip($request->start)->orderBy('id','desc')->get();

        foreach ($admins as $admin) {
            $admin->encrypt_id = encrypt($admin->id);
            $admin->recordId = $i;
            if ($order == 'ASC') {
                $i++;
            }
            else{
                $i--;
            }
        }
        $result['data']             =   $admins;
        $result['recordsTotal']     =   $total;
        $result['recordsFiltered']  =   $total;
        return $result;
    }

    public function storeAdmin($request){
        $admin_user = AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'status' => $request->status
        ]);
    }

    public function adminUserUpdate($request){
        self::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'status' => $request->status
        ]);  
      
        if($request->password) {
            self::where('id',$request->id)->update([
                'password' =>  bcrypt($request->password),
                ]); 
            }
       
        }

    public function adminDelete($id)
    {
        return self::where('id',$id)->delete();
    }
    public function adminStatusUpdate($request){
   
     self::where('id',$request->id)
        ->update([
            'status'        =>  $request->status, 
        ]);
      }
}
