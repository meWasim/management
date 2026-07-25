<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeInterfaceCommand extends Command
{

protected $signature =
'module:make-interface {module} {name}';

protected $description = 'Create an interface inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Interfaces;


interface $name
{


}

";


$generator->create(
$generator->path($module,'Interfaces',$name),
$content
);


$this->info("$name Interface created");

}

}
