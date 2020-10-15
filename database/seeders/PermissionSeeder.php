<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = ['write_article', 'edit_article', 'delete_article', 'view_article'];
        $len =  count($array);
        for ($i = 0; $i < $len; $i++) {
            Permission::create(['name' => $array[$i]]);
        }
    }
}
