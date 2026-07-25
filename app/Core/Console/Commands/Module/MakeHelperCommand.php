<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeHelperCommand extends Command
{

protected $signature =
'module:make-helper {module} {name}';

protected $description = 'Create a helper class inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Helpers;


class $name
{


}

";


$generator->create(
$generator->path($module,'Helpers',$name),
$content
);


$this->info("$name Helper created");

}

}
