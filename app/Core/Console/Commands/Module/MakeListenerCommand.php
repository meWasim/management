<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeListenerCommand extends Command
{

protected $signature =
'module:make-listener {module} {name}';

protected $description = 'Create an event listener inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Listeners;


class $name
{


public function handle(\$event)
{


}


}

";


$generator->create(
$generator->path($module,'Listeners',$name),
$content
);


$this->info("$name listener created");

}

}
