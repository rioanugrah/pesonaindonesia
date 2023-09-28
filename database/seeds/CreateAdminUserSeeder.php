<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'generate' => Str::uuid()->toString(), 
        	'name' => 'Rio Anugrah Adam Saputra', 
        	'email' => 'rioanugrah999@gmail.com',
        	'password' => bcrypt('admin123')
        ]);
  
        $role = Role::create(['name' => 'Administrator']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
    }
}
