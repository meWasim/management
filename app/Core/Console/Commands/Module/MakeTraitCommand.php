<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeTraitCommand extends Command
{

protected $signature =
'module:make-trait {module} {name}';

protected $description = 'Create a trait inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Traits;


trait $name
{


}

";


$generator->create(
$generator->path($module,'Traits',$name),
$content
);


$this->info("$name Trait created");

}

}
