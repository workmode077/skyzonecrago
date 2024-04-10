<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Admin\Entities\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminUser=DB::table('admin_users')->insert([
            'name'=>"Admin",
            'email'=>'admin@webcastle.in',
            'password'=>bcrypt('password'),
            'role_id'=>'1',
            'status'=>'1'
        ]);
    }
}
