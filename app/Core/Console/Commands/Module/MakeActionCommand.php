<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeActionCommand extends Command
{

protected $signature =
'module:make-action {module} {name}';

protected $description = 'Create an action class inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Actions;


class $name
{


public function execute(...\$args)
{

}


}

";


$generator->create(
$generator->path($module,'Actions',$name),
$content
);


$this->info("$name action created");

}

}
