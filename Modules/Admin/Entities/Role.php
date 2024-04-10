<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Role extends Authenticatable
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['title', 'description', 'slug', 'is_active'];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\RoleFactory::new();
    }
    public function permissions() {
        return $this->belongsToMany("Modules\Admin\Entities\Permission", "role_permissions", "role_id", "permission_id");
    }
    public function listRole($request)
    {
        $search   = $request->search['value'];
        $type     = $request->type;
        $sort     = $request->order;
        $column     =   $sort[0]['column'];
        $order      =   $sort[0]['dir'] == 'asc' ? "ASC" : "DESC" ;
        $admins      =   self::whereNotNull('id');
        if ($search != '') 
        {
            $admins=$admins->where('title', 'LIKE', '%'.$search.'%');
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
        
        $result['data'] =$admins;
        $result['recordsTotal'] = $total;
        $result['recordsFiltered'] =  $total;
        return $result;
    }
    public function deleteRole($id)
    {
        return self::where('id',$id)->delete();
    }
    public function roleDetail()
    {
        return self::orderBy('id','asc')->first();
    }
    public function rolestatusUpdate($request){
         self::where('id',$request->id)
        ->update([
            'is_active'        =>  $request->status,
        ]);
      
    }
}
