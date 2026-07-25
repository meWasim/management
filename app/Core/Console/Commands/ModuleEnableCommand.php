<?php

namespace App\Core\Console\Commands;

use Illuminate\Console\Command;
use App\Core\Modules\ModuleManager;


class ModuleEnableCommand extends Command
{


protected $signature =
'module:enable {module}';

protected $description = 'Enable a module and register its routes';



public function handle(
    ModuleManager $manager
)
{

    $module = $this->argument('module');


    if($manager->enable($module))
    {

        $this->call('route:clear');

        $this->info(
            "{$module} module enabled"
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
