<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeResourceCommand extends Command
{

protected $signature =
'module:make-resource {module} {name}';

protected $description = 'Create an API resource inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Http\\Resources;


use Illuminate\\Http\\Resources\\Json\\JsonResource;


class $name extends JsonResource
{


public function toArray(\$request)
{

return parent::toArray(\$request);

}


}

";


$generator->create(
$generator->path($module,'Http/Resources',$name),
$content
);


$this->info("$name resource created");

}

}
