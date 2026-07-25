<?php

namespace App\Modules\User\Providers;

use Illuminate\Support\ServiceProvider;


class UserServiceProvider extends ServiceProvider
{


    public function register(): void
    {

    }



    public function boot(): void
    {
        if (file_exists(__DIR__ . '/../Routes/web.php')) {
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        }

        if (file_exists(__DIR__ . '/../Routes/api.php')) {
            $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        }

        if (is_dir(__DIR__ . '/../Database/Migrations')) {
            $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        }

        if (is_dir(__DIR__ . '/../Resources/views')) {
            $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'user');
        }
    }

}

