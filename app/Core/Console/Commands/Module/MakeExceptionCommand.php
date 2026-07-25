<?php

namespace App\Core\Console\Commands\Module;

use Exception;
use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeExceptionCommand extends Command
{

protected $signature =
'module:make-exception {module} {name}';

protected $description = 'Create an exception inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Exceptions;


class $name extends Exception
{


}

";


$generator->create(
$generator->path($module,'Exceptions',$name),
$content
);


$this->info("$name Exception created");

}

}
