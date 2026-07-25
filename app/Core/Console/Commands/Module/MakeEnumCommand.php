<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeEnumCommand extends Command
{

protected $signature =
'module:make-enum {module} {name}';

protected $description = 'Create an enum inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Enums;


enum $name:string
{

case ACTIVE='active';

case INACTIVE='inactive';


}

";


$generator->create(
$generator->path($module,'Enums',$name),
$content
);


$this->info("$name Enum created");

}

}
