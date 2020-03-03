<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UnassignRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:unassign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Role unassign';

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

            $this->info("User chosen is $email");

            $role_name = $this->choice(
                'Which role would you like to remove?',
                Role::all()->pluck('name')->toArray()
            );

            $user = User::whereEmail($email)->first();
            $role = Role::whereName($role_name)->first();

            $user->removeRole($role);

            $this->info("$user->name is no longer $role_name");

        }
        catch (\Exception $exception)
        {
            Log::error('App\Console\Commands\UnassignRoleCommand');

            $this->info("Something went wrong!");
        }
    }
}
