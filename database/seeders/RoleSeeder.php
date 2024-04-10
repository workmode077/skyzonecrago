<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Role;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role = Role::create([ 'title' => 'super_admin','slug'=>"super_admin",'is_active'=>1]);
        // $role_admin = Role::create(['title' => 'admin','slug'=>"admin",'is_active'=>1]);

         $Permission = Permission::create(['title' => 'Dashboard','slug'=>'Dashboard']);
         $Permission = Permission::create(['title' => 'Admin','slug'=>'Admin']);
         $Permission = Permission::create(['title' => 'User','slug'=>'User']);
         $Permission = Permission::create(['title' => 'Settings','slug'=>'Settings']);
         $total_permissions = Permission::all();
                foreach($total_permissions as $perm){
                    $support=DB::table('role_permissions')->insert([
                        'role_id'=>1,
                        'permission_id'=>$perm->id
                    ]);
                }
    }
}
