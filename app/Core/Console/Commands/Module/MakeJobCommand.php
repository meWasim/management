<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeJobCommand extends Command
{

protected $signature =
'module:make-job {module} {name}';

protected $description = 'Create a queued job inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Jobs;


use Illuminate\\Contracts\\Queue\\ShouldQueue;
use Illuminate\\Foundation\\Bus\\Dispatchable;


class $name implements ShouldQueue
{

use Dispatchable;


public function handle()
{

}


}

";


$generator->create(
$generator->path($module,'Jobs',$name),
$content
);


$this->info("$name job created");

}

}
