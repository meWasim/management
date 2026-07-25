<?php

namespace App\Core\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class MakeModuleCommand extends Command
{

    protected $signature = 'make:module {name} {--description= : A short description of the module}';

    protected $description =
        'Create a complete application module';


    public function handle()
    {

        $name = ucfirst($this->argument('name'));
        $description = $this->option('description') ?: "{$name} module.";


        $path = app_path("Modules/$name");


        if(File::exists($path))
        {
            $this->error(
                "Module already exists"
            );

            return Command::FAILURE;
        }



        $directories = [

        // Configuration
        'Config',

        // Database
        'Database/Migrations',
        'Database/Seeders',
        'Database/Factories',

        // Domain
        'Models',
        'Repositories',
        'Interfaces',
        'Contracts',
        'Services',
        'Actions',
        'DTOs',

        // Events
        'Events',
        'Listeners',
        'Observers',
        'Jobs',

        // Communication
        'Mail',
        'Notifications',
        'Broadcasting',

        // Authorization
        'Policies',

        // Validation
        'Rules',

        // Model Extensions
        'Scopes',
        'Casts',
        'Traits',

        // Support
        'Enums',
        'Exceptions',
        'Helpers',

        // Console
        'Console/Commands',

        // HTTP
        'Http/Controllers/Web',
        'Http/Controllers/Api',
        'Http/Requests',
        'Http/Resources',
        'Http/Middleware',

        // Providers
        'Providers',

        // Resources
        'Resources/views',
        'Resources/lang',
        'Resources/assets',

        // Routes
        'Routes',

        // Tests
        'Tests/Feature',
        'Tests/Unit',

    ];



        foreach($directories as $directory)
        {

            File::makeDirectory(
                "$path/$directory",
                0755,
                true
            );

        }



        /*
        |--------------------------------------------------------------------------
        | Module Information
        |--------------------------------------------------------------------------
        */

        File::put(

            "$path/module.json",

            json_encode(
                [
                    'name'=>$name,
                    'description'=>$description,
                    'enabled'=>true,
                    'version'=>'1.0.0'
                ],
                JSON_PRETTY_PRINT
            )

        );



        /*
        |--------------------------------------------------------------------------
        | Routes
        |--------------------------------------------------------------------------
        */

        File::put(
            "$path/Routes/web.php",
            "<?php\n\n"
        );


        File::put(
            "$path/Routes/api.php",
            "<?php\n\n"
        );

        File::put(
            "$path/README.md",
"# {$name} module

{$description}

## Status

This module is enabled by default. Disable or enable it with:

```bash
php artisan module:disable ".strtolower($name)."
php artisan module:enable ".strtolower($name)."
```

## Structure

- `Routes/web.php` — browser routes.
- `Routes/api.php` — API routes.
- `Http/Controllers` — HTTP controllers.
- `Services` — application services.
- `Models` — Eloquent models.
- `Database/Migrations` — database migrations.

Document public endpoints, permissions, configuration, and dependencies here as the module grows.
"
        );




        /*
        |--------------------------------------------------------------------------
        | Service Provider
        |--------------------------------------------------------------------------
        */

        File::put(

            "$path/Providers/{$name}ServiceProvider.php",

"<?php

namespace App\\Modules\\$name\\Providers;

use Illuminate\\Support\\ServiceProvider;


class {$name}ServiceProvider extends ServiceProvider
{


    public function register(): void
    {

    }



    public function boot(): void
    {

    }


}

"

        );





        /*
        |--------------------------------------------------------------------------
        | Model Example
        |--------------------------------------------------------------------------
        */

        File::put(

        "$path/Models/{$name}.php",

"<?php

namespace App\\Modules\\$name\\Models;

use Illuminate\\Database\\Eloquent\\Model;


class {$name} extends Model
{

protected \$guarded=[];

}

"

        );






        /*
        |--------------------------------------------------------------------------
        | Observer Example
        |--------------------------------------------------------------------------
        */

        File::put(

        "$path/Observers/{$name}Observer.php",

"<?php

namespace App\\Modules\\$name\\Observers;


use App\\Modules\\$name\\Models\\$name;


class {$name}Observer
{


public function created({$name} \$model)
{

}


public function updated({$name} \$model)
{

}


public function deleted({$name} \$model)
{

}


}

"

        );







        /*
        |--------------------------------------------------------------------------
        | Event Example
        |--------------------------------------------------------------------------
        */


        File::put(

        "$path/Events/{$name}Created.php",

"<?php

namespace App\\Modules\\$name\\Events;


use App\\Modules\\$name\\Models\\$name;


class {$name}Created
{

public function __construct(
    public {$name} \$model
)
{}

}

"

        );






        /*
        |--------------------------------------------------------------------------
        | Repository
        |--------------------------------------------------------------------------
        */

        File::put(

        "$path/Repositories/{$name}Repository.php",

"<?php

namespace App\\Modules\\$name\\Repositories;


class {$name}Repository
{


}

"

        );







        /*
        |--------------------------------------------------------------------------
        | Service
        |--------------------------------------------------------------------------
        */

        File::put(

        "$path/Services/{$name}Service.php",

"<?php

namespace App\\Modules\\$name\\Services;


class {$name}Service
{


}

"

        );





        /*
        |--------------------------------------------------------------------------
        | Controller
        |--------------------------------------------------------------------------
        */

        File::put(

        "$path/Http/Controllers/{$name}Controller.php",

"<?php

namespace App\\Modules\\$name\\Http\\Controllers;


use App\\Http\\Controllers\\Controller;


class {$name}Controller extends Controller
{


}

"

        );





        $this->info(
            "Module {$name} created successfully"
        );


        return Command::SUCCESS;

    }

}
