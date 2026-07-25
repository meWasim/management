<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeProviderCommand extends Command
{

protected $signature =
'module:make-provider {module} {name}';

protected $description = 'Create a service provider inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Providers;

use Illuminate\\Support\\ServiceProvider;


class $name extends ServiceProvider
{


public function register(): void
{

}


public function boot(): void
{

}


}

";


$generator->create(
$generator->path($module,'Providers',$name),
$content
);


$this->info("$name Provider created");

}

}
