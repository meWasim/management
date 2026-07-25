<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeModelCommand extends Command
{

protected $signature =
'module:make-model {module} {name}';

protected $description = 'Create an Eloquent model inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));

$name=ucfirst($this->argument('name'));


$path=$generator->path(
$module,
'Models',
$name
);



$content="<?php

namespace App\\Modules\\$module\\Models;


use Illuminate\\Database\\Eloquent\\Model;


class $name extends Model
{

protected \$guarded=[];


}

";



$generator->create(
$path,
$content
);


$this->info("$name model created");


}

}
