<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt(12345678)]);
        Role::create(['name' => 'admin']);
        $user->assignRole('admin');
        $this->call([
            PermissionSeeder::class,
            RoleAsigneSeeder::class,
        ]);
    }
}
