<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeMailCommand extends Command
{

protected $signature =
'module:make-mail {module} {name}';

protected $description = 'Create a mail class inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Mail;

use Illuminate\\Mail\\Mailable;
use Illuminate\\Bus\\Queueable;
use Illuminate\\Queue\\SerializesModels;


class $name extends Mailable
{

use Queueable,SerializesModels;


public function build()
{
return \$this;
}


}

";


$generator->create(
$generator->path($module,'Mail',$name),
$content
);


$this->info("$name Mail created");

}

}
