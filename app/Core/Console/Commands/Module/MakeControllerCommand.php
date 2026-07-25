<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeControllerCommand extends Command
{

protected $signature =
'module:make-controller {module} {name}';


protected $description =
'Create module controller';



public function handle(ModuleGenerator $generator)
{

$module = ucfirst($this->argument('module'));

$name = ucfirst($this->argument('name'));



$path=$generator->path(
    $module,
    'Http/Controllers',
    $name
);



$content="<?php

namespace App\\Modules\\$module\\Http\\Controllers;

use App\\Core\\Http\\Controllers\\BaseController;


class $name extends BaseController
{


}

";



$generator->create(
    $path,
    $content
);



$this->info("$name created");

}

}
