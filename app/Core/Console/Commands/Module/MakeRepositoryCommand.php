<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeRepositoryCommand extends Command
{

    protected $signature =
        'module:make-repository {module} {name}';

    protected $description = 'Create a repository class inside a module';


    public function handle(ModuleGenerator $generator)
    {

        $module = ucfirst($this->argument('module'));
        $name = ucfirst($this->argument('name'));


        $content = "<?php

namespace App\\Modules\\$module\\Repositories;


use App\\Core\\Repositories\\BaseRepository;


class $name extends BaseRepository
{


}

";


        $generator->create(
            $generator->path(
                $module,
                'Repositories',
                $name
            ),
            $content
        );


        $this->info("$name repository created");

    }

}
