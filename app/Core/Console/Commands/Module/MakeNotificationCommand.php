<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;

class MakeNotificationCommand extends Command
{

protected $signature =
'module:make-notification {module} {name}';

protected $description = 'Create a notification inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Notifications;

use Illuminate\\Bus\\Queueable;
use Illuminate\\Notifications\\Notification;


class $name extends Notification
{

use Queueable;


public function via(object \$notifiable): array
{
return ['mail'];
}


public function toArray(object \$notifiable): array
{
return [];
}


}

";


$generator->create(
$generator->path($module,'Notifications',$name),
$content
);


$this->info("$name Notification created");

}

}
