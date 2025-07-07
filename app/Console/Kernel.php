<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Menghasilkan sitemap setiap hari pada pukul 01:00
        $schedule->command('sitemap:generate')->dailyAt('01:00');
        
        // Memperbarui metadata cluster harga dari file JSON ke cache setiap 6 jam
        // Ini memastikan metadata selalu tersedia di cache meskipun cache dibersihkan
        $schedule->command('cluster:refresh-metadata')->everyFourHours();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}