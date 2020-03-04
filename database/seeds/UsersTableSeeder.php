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
        $user = User::create([
            'name' => 'Sebastian Fix',
            'email' => 'sebastian.fix@students.fhnw.ch',
            'password' => $this->getPassword()
        ]);
    }

    protected function getPassword()
    {
        return bcrypt(Str::random(16));
    }
}
