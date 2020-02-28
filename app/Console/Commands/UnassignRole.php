<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class UnassignRole extends Command
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
        $user_email = $this->choice(
            'Which user would you like to select?',
            User::all()->pluck('email')->toArray()
        );

        $this->info("User chosen is $user_email");

        $role_name = $this->choice(
            'Which role would you like to remove?',
            Role::all()->pluck('name')->toArray()
        );

        try {
            $user = User::whereEmail($user_email)->first();
            $role = Role::whereName($role_name)->first();

            $user->removeRole($role);

            $this->info("$user->name is no longer $role_name");

        }
        catch (\Exception $exception)
        {
            $this->info("Something went wrong!");
        }
    }
}
