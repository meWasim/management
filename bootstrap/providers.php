<?php

use App\Core\Modules\ModuleServiceProvider;
use App\Providers\AppServiceProvider;
use App\Providers\ConsoleServiceProvider;
use App\Providers\FortifyServiceProvider;
use App\Providers\TenancyServiceProvider;

return [
    AppServiceProvider::class,
    FortifyServiceProvider::class,
    TenancyServiceProvider::class,
    ConsoleServiceProvider::class,
    ModuleServiceProvider::class,
];
