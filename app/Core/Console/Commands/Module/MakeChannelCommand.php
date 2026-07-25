<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;

class MakeChannelCommand extends Command
{

    protected $signature =
        'module:make-channel {module} {name}';


    protected $description =
        'Create a broadcast channel inside a module';


    public function handle()
    {

        $module = ucfirst($this->argument('module'));
        $name   = ucfirst($this->argument('name'));


        $path = app_path(
            "Modules/{$module}/Broadcast/Channels/{$name}.php"
        );


        if (file_exists($path)) {

            $this->error(
                "Channel {$name} already exists."
            );

            return Command::FAILURE;
        }


        if (!is_dir(dirname($path))) {

            mkdir(dirname($path), 0777, true);
        }


        $content = <<<PHP
<?php

namespace App\Modules\\{$module}\Broadcast\Channels;

use Illuminate\Support\Facades\Broadcast;


Broadcast::channel(
    '{$module}.channel',
    function (\$user) {

        return true;

    }
);

PHP;


        file_put_contents($path, $content);


        $this->info(
            "Broadcast channel {$name} created successfully."
        );


        return Command::SUCCESS;
    }

}
