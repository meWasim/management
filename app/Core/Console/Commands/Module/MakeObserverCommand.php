<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeObserverCommand extends Command
{

protected $signature =
'module:make-observer {module} {name}';

protected $description = 'Create a model observer inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Observers;


class $name
{


public function created(\$model)
{


}



public function updated(\$model)
{


}



public function deleted(\$model)
{


}


}

";


$generator->create(
$generator->path($module,'Observers',$name),
$content
);


$this->info("$name observer created");

}

}
