<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Stancl\Tenancy\Contracts\Tenant;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class MigrateTenantModules implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
   public function handle(Tenant $tenant): void
    {
        tenancy()->initialize($tenant);

        foreach (File::directories(app_path('Modules')) as $module) {

            $migrationPath = $module . '/Database/Migrations';

            if (File::isDirectory($migrationPath)) {

                Artisan::call('migrate', [
                    '--database' => 'tenant',
                    '--path' => $migrationPath,
                    '--realpath' => true,
                    '--force' => true,
                ]);
            }
        }

        tenancy()->end();
    }
}
