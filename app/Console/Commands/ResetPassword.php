<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        try {

            $email = $this->choice(
                'Which user would you like to select?',
                User::all()->pluck('email')->toArray()
            );

            $user = User::whereEmail($email)->first();

            $password = Str::random(16);

            $user->update([
                'password' => bcrypt($password)
            ]);

            $this->info("New password: $password");

        } catch (\Exception $exception) {

            Log::error('App\Console\Commands\ResetPassword');

            $this->info("Something went wrong!");
        }
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

}
