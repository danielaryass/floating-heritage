<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// use model permission
use App\Models\ManagementAccess\Permission;
// use model role
use App\Models\ManagementAccess\Role;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // for super admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permission()->sync($admin_permissions->pluck('id'));

        // get permission simple for admin
        $editor_permissions = $admin_permissions->filter(function ($permission) {
            // fix admin_access
            return $permission->title != 'admin_access';
        }); 
        // for admin    
        Role::findOrFail(2)->permission()->sync($editor_permissions);
        // add permission for writter/id 3 just writter_acces
        $writter_permissions = $editor_permissions->filter(function ($permission) {
            // fix admin_access
            return $permission->title != 'editor_access';
        }); 
        Role::findOrFail(3)->permission()->sync($writter_permissions);
        // how to add permission for writter/id 3 just writter_accesRole::findOrFail(3)->permission()->sync(Permission::where('title', 'writter_acces')->pluck('id'));

    
    }
}
