<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeMiddlewareCommand extends Command
{

protected $signature =
'module:make-middleware {module} {name}';

protected $description = 'Create HTTP middleware inside a module';



public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));

$name=ucfirst($this->argument('name'));



$content="<?php

namespace App\\Modules\\$module\\Http\\Middleware;


use Closure;
use Illuminate\\Http\\Request;


class $name
{


public function handle(
Request \$request,
Closure \$next
)
{

return \$next(\$request);

}


}

";



$generator->create(
$generator->path(
$module,
'Http/Middleware',
$name
),
$content
);


$this->info("$name middleware created");

}

}
