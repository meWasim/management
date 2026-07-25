<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakePolicyCommand extends Command
{

protected $signature =
'module:make-policy {module} {name}';

protected $description = 'Create an authorization policy inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Policies;


class $name
{


}


";


$generator->create(
$generator->path($module,'Policies',$name),
$content
);


$this->info("$name policy created");

}

}
