<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeTestCommand extends Command
{

protected $signature =
'module:make-test {module} {name}';

protected $description = 'Create a test class inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));

$name=ucfirst($this->argument('name'));



$content="<?php

namespace App\\Modules\\$module\\Tests;


use Tests\\TestCase;


class $name extends TestCase
{


public function test_example()
{

\$this->assertTrue(true);

}


}

";



$generator->create(
$generator->path(
$module,
'Tests/Feature',
$name
),
$content
);


$this->info("$name test created");

}

}
