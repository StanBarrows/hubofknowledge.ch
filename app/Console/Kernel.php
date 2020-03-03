<?php

namespace App\Console;

use App\Console\Commands\AssignRoleCommand;
use App\Console\Commands\CreateUserCommand;
use App\Console\Commands\InviteUserCommand;
use App\Console\Commands\UnassignRoleCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        AssignRoleCommand::class,
        CreateUserCommand::class,
        InviteUserCommand::class,
        UnassignRoleCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
