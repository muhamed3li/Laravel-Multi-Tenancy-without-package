<?php

namespace App\Console\Commands\System;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SystemMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'System Migration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Start Migrating LandLord System');
        $this->info('.........................');
        Artisan::call('migrate:fresh --path=database/migrations/system --database=system');
        $this->info(Artisan::output());
        return Command::SUCCESS;
    }
}
