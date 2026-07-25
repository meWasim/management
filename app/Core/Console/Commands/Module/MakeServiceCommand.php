<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeServiceCommand extends Command
{

protected $signature=
'module:make-service {module} {name}';

protected $description = 'Create a service class inside a module';



public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Services;


class $name
{


}

";


$generator->create(
$generator->path(
$module,
'Services',
$name
),
$content
);


$this->info("$name created");

}

}
