<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeSeederCommand extends Command
{

protected $signature =
'module:make-seeder {module} {name}';

protected $description = 'Create a database seeder inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));

$name=ucfirst($this->argument('name'));



$content="<?php

namespace App\\Modules\\$module\\Database\\Seeders;


use Illuminate\\Database\\Seeder;


class $name extends Seeder
{


public function run()
{


}


}

";



$generator->create(
$generator->path(
$module,
'Database/Seeders',
$name
),
$content
);


$this->info("$name seeder created");

}

}
