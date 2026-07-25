<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;


class MakeRequestCommand extends Command
{

protected $signature=
'module:make-request {module} {name}';

protected $description = 'Create a form request inside a module';



public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));
$name=ucfirst($this->argument('name'));


$content="<?php

namespace App\\Modules\\$module\\Http\\Requests;


use Illuminate\\Foundation\\Http\\FormRequest;


class $name extends FormRequest
{


public function authorize(): bool
{
return true;
}



public function rules(): array
{
return [

];

}


}

";


$generator->create(
$generator->path(
$module,
'Http/Requests',
$name
),
$content
);


$this->info("$name created");

}

}
