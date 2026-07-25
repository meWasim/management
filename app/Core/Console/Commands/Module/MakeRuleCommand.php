<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeRuleCommand extends Command
{

protected $signature =
'module:make-rule {module} {name}';

protected $description = 'Create a validation rule inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Rules;

use Closure;
use Illuminate\\Contracts\\Validation\\ValidationRule;


class $name implements ValidationRule
{


public function validate(string \$attribute,mixed \$value,Closure \$fail): void
{

}


}

";


$generator->create(
$generator->path($module,'Rules',$name),
$content
);


$this->info("$name Rule created");

}

}
