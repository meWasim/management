<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeEventCommand extends Command
{

protected $signature =
'module:make-event {module} {name}';

protected $description = 'Create an event inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Events;


class $name
{


public function __construct()
{


}


}

";


$generator->create(
$generator->path($module,'Events',$name),
$content
);


$this->info("$name event created");

}

}
