<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeFactoryCommand extends Command
{

protected $signature =
'module:make-factory {module} {name}';

protected $description = 'Create a model factory inside a module';



public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));



$content="<?php

namespace App\\Modules\\$module\\Database\\Factories;


use Illuminate\\Database\\Eloquent\\Factories\\Factory;


class {$name}Factory extends Factory
{


public function definition()
{

return [

];

}


}

";



$generator->create(
$generator->path(
$module,
'Database/Factories',
$name.'Factory'
),
$content
);


$this->info("$name factory created");

}

}
