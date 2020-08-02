<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'password:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Password reset';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $email = $this->choice(
                'Which user would you like to reset?',
                User::all()->pluck('email')->toArray()
            );

            $user = User::whereEmail($email)->first();

            $password = Str::random(12);

            $user->update([
                'password' => bcrypt($password)
            ]);

            $this->info("New pasword: $password");

        } catch (\Exception $exception) {

            Log::error($exception->getMessage());

            $this->info("Something went wrong!");
        }
    }
}
