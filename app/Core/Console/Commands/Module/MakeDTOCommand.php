<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeDTOCommand extends Command
{

protected $signature =
'module:make-dto {module} {name}';

protected $description = 'Create a data transfer object inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\DTO;


use App\\Core\\DTO\\BaseDTO;


class $name extends BaseDTO
{


public function __construct()
{

}


}

";


$generator->create(
$generator->path($module,'DTO',$name),
$content
);


$this->info("$name DTO created");

}

}
