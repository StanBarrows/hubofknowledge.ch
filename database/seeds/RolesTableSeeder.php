<?php

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => \App\Models\Role::ROLE_ADMINISTRATOR]);
        Role::create(['name' => \App\Models\Role::ROLE_EXPERT]);

    }
}
