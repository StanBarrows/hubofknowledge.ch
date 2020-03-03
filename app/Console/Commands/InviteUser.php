<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class InviteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:invite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User invite';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {

            $email = $this->choice(
                'Which user would you like to invite?',
                User::all()->pluck('email')->toArray()
            );

            $user = User::whereEmail($email)->first();

            $token = Password::getRepository()->create($user);

            $user->sendPasswordResetNotification($token);

            $this->info("You've successfully invited $user->name!");

        } catch (\Exception $exception) {

            Log::error('App\Console\Commands\InviteUser');

            $this->info("Something went wrong!");
        }
    }
}
