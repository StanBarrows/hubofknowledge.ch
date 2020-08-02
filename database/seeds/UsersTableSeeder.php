<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as SpatieRole;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'administrator@hok.ch',
            'password' => bcrypt('secret') //password => secret
        ]);

        $role = SpatieRole::findOrCreate(Role::ROLE_ADMINISTRATOR);
        $user->assignRole($role);

        $user = User::create([
            'name' => 'Expert',
            'email' => 'expert@hok.ch',
            'password' => bcrypt('secret') //password => secret
        ]);

        $role = SpatieRole::findOrCreate(Role::ROLE_EXPERT);
        $user->assignRole($role);
    }

}
