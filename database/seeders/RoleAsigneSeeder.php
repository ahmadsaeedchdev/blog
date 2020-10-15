<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAsigneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role =  Role::create(['name' => 'writer']);
        $role->syncPermissions('write_article');
        $role->syncPermissions('view_article');
    }
}
