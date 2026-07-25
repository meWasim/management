<?php

namespace App\Core\Console\Commands;

use Illuminate\Console\Command;
use App\Core\Modules\ModuleManager;


class ModuleDisableCommand extends Command
{


protected $signature =
'module:disable {module}';

protected $description = 'Disable a module and unregister its routes';



public function handle(
    ModuleManager $manager
)
{

    $module = $this->argument('module');


    if($manager->disable($module))
    {

        $this->call('route:clear');

        $this->info(
            "{$module} module disabled"
        );

    }
    else
    {

        $this->error(
            "Module not found"
        );

    }

}


}
