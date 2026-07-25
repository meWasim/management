<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeCommandCommand extends Command
{

    protected $signature =
    'module:make-command {module} {name}';


    protected $description =
    'Create module console command';


    public function handle(ModuleGenerator $generator)
    {

        $module = ucfirst($this->argument('module'));
        $name = ucfirst($this->argument('name'));


        $content = "<?php

namespace App\\Modules\\$module\\Console\\Commands;


use Illuminate\\Console\\Command;


class $name extends Command
{

protected \$signature =
'{$module}:command';


protected \$description =
'Module command';



public function handle()
{

}


}

";


        $generator->create(
            $generator->path(
                $module,
                'Console/Commands',
                $name
            ),
            $content
        );


        $this->info("$name command created");

    }

}
