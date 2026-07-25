<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeComponentCommand extends Command
{

    protected $signature =
        'module:make-component {module} {name}';


    protected $description =
        'Create a component inside a module';


    public function handle(ModuleGenerator $generator)
    {

        $module = ucfirst($this->argument('module'));
        $name   = ucfirst($this->argument('name'));


        $path = app_path(
            "Modules/{$module}/Components/{$name}.php"
        );


        if (file_exists($path)) {

            $this->error("Component already exists.");

            return Command::FAILURE;
        }


        if (!is_dir(dirname($path))) {

            mkdir(dirname($path), 0777, true);
        }


        $class = <<<PHP
<?php

namespace App\Modules\\{$module}\Components;

use Illuminate\View\Component;


class {$name} extends Component
{

    public function __construct()
    {

    }


    public function render()
    {
        return view(
            'components.'.strtolower('{$module}').'.'.strtolower('{$name}')
        );
    }

}

PHP;


        file_put_contents($path, $class);



        /*
        Blade View
        */

        $viewPath = resource_path(
            "views/components/".strtolower($module)."/".strtolower($name).".blade.php"
        );


        if (!is_dir(dirname($viewPath))) {

            mkdir(dirname($viewPath), 0777, true);
        }


        file_put_contents(
            $viewPath,
            "<div>\n    {{-- {$name} component --}}\n</div>"
        );


        $this->info(
            "Component {$name} created successfully in {$module} module."
        );


        return Command::SUCCESS;
    }

}
