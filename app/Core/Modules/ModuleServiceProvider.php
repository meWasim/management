<?php

namespace App\Core\Modules;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class ModuleServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->singleton(
            ModuleManager::class,
            function () {

                return new ModuleManager();

            }
        );
    }


    public function boot(ModuleManager $manager): void
    {

        foreach ($manager->all() as $module) {
            // Load module configuration
            $this->loadConfig($module);
            // Load routes
            $this->loadRoutes($module);
            // Load views
            $this->loadViews($module);
            // Load translations
            $this->loadTranslations($module);
            // Load migrations
            $this->loadMigrations($module);
            // Register module provider
            $this->loadProvider($module);


        }

    }

    /**
     * Load module routes
     */
    protected function loadRoutes(Module $module): void
    {

        foreach([
            'web',
            'api'
        ] as $route)
        {

            $file =
                $module->path(
                    "Routes/{$route}.php"
                );


            if(File::exists($file))
            {
                $this->loadRoutesFrom($file);
            }

        }

    }





    /**
     * Load module views
     */
    protected function loadViews(Module $module): void
    {

        $path =
            $module->path(
                'Resources/views'
            );


        if(File::isDirectory($path))
        {

            $this->loadViewsFrom(
                $path,
                $module->name()
            );

        }

    }





    /**
     * Load translations
     */
    protected function loadTranslations(Module $module): void
    {

        $path =
            $module->path(
                'Resources/lang'
            );


        if(File::isDirectory($path))
        {

            $this->loadTranslationsFrom(
                $path,
                $module->name()
            );

        }

    }





    /**
     * Load migrations
     */
    protected function loadMigrations(Module $module): void
    {

        $path =
            $module->path(
                'Database/Migrations'
            );


        if(File::isDirectory($path))
        {

            $this->loadMigrationsFrom($path);

        }

    }





    /**
     * Load module config files
     */
    protected function loadConfig(Module $module): void
    {

        $path =
            $module->path(
                'Config'
            );


        if(!File::isDirectory($path))
        {
            return;
        }


        foreach(File::files($path) as $file)
        {

            $key =
                pathinfo(
                    $file->getFilename(),
                    PATHINFO_FILENAME
                );


            $this->mergeConfigFrom(
                $file->getPathname(),
                strtolower($module->name())
                .".".$key
            );

        }

    }






    /**
     * Load module service provider
     */
    protected function loadProvider(Module $module): void
    {

        $provider =
            $module->namespace()
            ."\\Providers\\"
            .$module->name()
            ."ServiceProvider";


        if(class_exists($provider))
        {

            $this->app->register(
                $provider
            );

        }

    }

}
