<?php

namespace App\Core\Console\Commands\Module;

use Illuminate\Console\Command;
use App\Core\Console\Generators\ModuleGenerator;
use Illuminate\Support\Str;


class MakeMigrationCommand extends Command
{

protected $signature =
'module:make-migration {module} {name}';

protected $description = 'Create a database migration inside a module';


public function handle(ModuleGenerator $generator)
{

$module=ucfirst($this->argument('module'));

$name=$this->argument('name');


$file =
date('Y_m_d_His')
."_"
.$name
.".php";


$class =
Str::studly($name);



$content="<?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;


return new class extends Migration
{


public function up()
{

Schema::create('$name',function(Blueprint \$table){

\$table->id();

\$table->timestamps();

});


}



public function down()
{

Schema::dropIfExists('$name');

}


};

";


$path=
app_path(
"Modules/$module/Database/Migrations/$file"
);


$generator->create(
$path,
$content
);


$this->info("$file migration created");

}

}
