<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeCastCommand extends Command
{

protected $signature =
'module:make-cast {module} {name}';

protected $description = 'Create an Eloquent cast inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Casts;

use Illuminate\\Contracts\\Database\\Eloquent\\CastsAttributes;


class $name implements CastsAttributes
{


public function get(\$model,string \$key,mixed \$value,array \$attributes): mixed
{
return \$value;
}


public function set(\$model,string \$key,mixed \$value,array \$attributes): mixed
{
return \$value;
}


}

";


$generator->create(
$generator->path($module,'Casts',$name),
$content
);


$this->info("$name Cast created");

}

}
