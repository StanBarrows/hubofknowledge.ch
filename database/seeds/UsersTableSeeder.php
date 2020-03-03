<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $administrator = \Spatie\Permission\Models\Role::whereName('administrator')->first();
        $expert = \Spatie\Permission\Models\Role::whereName('expert')->first();

        $sebastian = User::create([
            'name' => 'Sebastian Fix',
            'email' => 'sebastian.fix@students.fhnw.ch',
            'password' => $this->getPassword()
        ]);

        $sebastian->assignRole($administrator);

        $enkelejda = User::create([
           'name' => 'Miho Enkelejda',
           'email' => 'enkelejda.miho@fhnw.ch',
            'password' => $this->getPassword()
        ]);

        $enkelejda->assignRole($administrator);
        $enkelejda->assignRole($expert);


        $wenderbordn = User::create([
            'name' => 'Sebastian Wendeborn',
            'email' => 'sebastian.wendeborn@fhnw.ch',
            'password' => $this->getPassword()
        ]);

        $wenderbordn->assignRole($expert);

        User::create([
            'name' => 'Teyfik Agac',
            'email' => 'teyfik.agac@students.fhnw.ch',
            'password' => $this->getPassword()
        ]);

        User::create([
            'name' => 'Deniz Tosoni',
            'email' => 'deniz.tosoni@students.fhnw.ch',
            'password' => $this->getPassword()
        ]);

        User::create([
            'name' => 'Angelina Markl',
            'email' => 'angelina.markl@students.fhnw.ch',
            'password' => $this->getPassword()
        ]);
    }

    protected function getPassword()
    {
        return bcrypt(Str::random(16));
    }
}
