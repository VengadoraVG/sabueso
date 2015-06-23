<?php namespace App\Console;

use DB;
use TG;

use App\Http\Controllers\NotificationController as Notify;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();

                /* $schedule->call(function () { */
                /*     TG::sendMsg('r00th', time()); */
                /*     $command = '/home/vg/project/sabueso/test-script >> /home/vg/project/sabueso/error-log'; */
                /*     shell_exec($command);                     */
                /*   })->cron('* * * * *'); */

	}

}
