<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\CheckStorageCronn;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('checkstorage:cron')->everyMinute();
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


  /**
->cron('* * * * *');    Run the task on a custom cron schedule
->everyMinute();    Run the task every minute
->everyTwoMinutes();    Run the task every two minutes
->everyThreeMinutes();  Run the task every three minutes
->everyFourMinutes();   Run the task every four minutes
->everyFiveMinutes();   Run the task every five minutes
->everyTenMinutes();    Run the task every ten minutes
->everyFifteenMinutes();    Run the task every fifteen minutes
->everyThirtyMinutes(); Run the task every thirty minutes
->hourly(); Run the task every hour
->hourlyAt(17); Run the task every hour at 17 minutes past the hour
->everyTwoHours();  Run the task every two hours
->everyThreeHours();    Run the task every three hours
->everyFourHours(); Run the task every four hours
->everySixHours();  Run the task every six hours
->daily();  Run the task every day at midnight
->dailyAt('13:00'); Run the task every day at 13:00
->twiceDaily(1, 13);    Run the task daily at 1:00 & 13:00
->weekly(); Run the task every Sunday at 00:00
->weeklyOn(1, '8:00');  Run the task every week on Monday at 8:00
->monthly();    Run the task on the first day of every month at 00:00
->monthlyOn(4, '15:00');    Run the task every month on the 4th at 15:00
->twiceMonthly(1, 16, '13:00'); Run the task monthly on the 1st and 16th at 13:00
->lastDayOfMonth('15:00');  Run the task on the last day of the month at 15:00
->quarterly();  Run the task on the first day of every quarter at 00:00
->yearly(); Run the task on the first day of every year at 00:00
->yearlyOn(6, 1, '17:00');  Run the task every year on June 1st at 17:00
->timezone('America/New_York'); Set the timezone for the task
*/
