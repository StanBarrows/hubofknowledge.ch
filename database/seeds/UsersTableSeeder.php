<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sebastian Fix ',
            'email' => 'sebastian.fix@students.fhnw.ch',
            'password' => bcrypt('HOK2020$$')
        ]);

        User::create([
           'name' => 'Miho Enkelejda ',
           'email' => 'enkelejda.miho@fhnw.ch',
           'password' => bcrypt('HOK2020$$')
        ]);
    }
}
