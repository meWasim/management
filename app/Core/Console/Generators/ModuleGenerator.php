<?php

namespace App\Core\Console\Generators;

use Illuminate\Support\Facades\File;

class ModuleGenerator
{

    public function path(
        string $module,
        string $folder,
        string $name
    ): string {

        return app_path(
            "Modules/{$module}/{$folder}/{$name}.php"
        );

    }



    public function create(
        string $path,
        string $content
    ): void {

        File::ensureDirectoryExists(
            dirname($path)
        );


        File::put(
            $path,
            $content
        );

    }



    public function namespace(
        string $module,
        string $folder
    ): string {

        return "App\\Modules\\{$module}\\"
            .str_replace('/','\\',$folder);

    }

}
