<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeScopeCommand extends Command
{

protected $signature =
'module:make-scope {module} {name}';

protected $description = 'Create an Eloquent query scope inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Scopes;

use Illuminate\\Database\\Eloquent\\Builder;


class $name
{


public function __invoke(Builder \$query): Builder
{
return \$query;
}


}

";


$generator->create(
$generator->path($module,'Scopes',$name),
$content
);


$this->info("$name Scope created");

}

}
