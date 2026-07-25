<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * All custom Artisan commands.
     */
    protected array $commands = [
        \App\Core\Console\Commands\MakeModuleCommand::class,
        \App\Core\Console\Commands\ModuleEnableCommand::class,
        \App\Core\Console\Commands\ModuleDisableCommand::class,
        \App\Core\Console\Commands\ModuleListCommand::class,

        \App\Core\Console\Commands\Module\MakeActionCommand::class,
        \App\Core\Console\Commands\Module\MakeCastCommand::class,
        \App\Core\Console\Commands\Module\MakeChannelCommand::class,
        \App\Core\Console\Commands\Module\MakeCommandCommand::class,
        \App\Core\Console\Commands\Module\MakeComponentCommand::class,
        \App\Core\Console\Commands\Module\MakeControllerCommand::class,
        \App\Core\Console\Commands\Module\MakeDTOCommand::class,
        \App\Core\Console\Commands\Module\MakeEnumCommand::class,
        \App\Core\Console\Commands\Module\MakeEventCommand::class,
        \App\Core\Console\Commands\Module\MakeExceptionCommand::class,
        \App\Core\Console\Commands\Module\MakeFactoryCommand::class,
        \App\Core\Console\Commands\Module\MakeHelperCommand::class,
        \App\Core\Console\Commands\Module\MakeInterfaceCommand::class,
        \App\Core\Console\Commands\Module\MakeJobCommand::class,
        \App\Core\Console\Commands\Module\MakeListenerCommand::class,
        \App\Core\Console\Commands\Module\MakeMailCommand::class,
        \App\Core\Console\Commands\Module\MakeMiddlewareCommand::class,
        \App\Core\Console\Commands\Module\MakeMigrationCommand::class,
        \App\Core\Console\Commands\Module\MakeModelCommand::class,
        \App\Core\Console\Commands\Module\MakeNotificationCommand::class,
        \App\Core\Console\Commands\Module\MakeObserverCommand::class,
        \App\Core\Console\Commands\Module\MakePolicyCommand::class,
        \App\Core\Console\Commands\Module\MakeProviderCommand::class,
        \App\Core\Console\Commands\Module\MakeRepositoryCommand::class,
        \App\Core\Console\Commands\Module\MakeRequestCommand::class,
        \App\Core\Console\Commands\Module\MakeResourceCommand::class,
        \App\Core\Console\Commands\Module\MakeRuleCommand::class,
        \App\Core\Console\Commands\Module\MakeScopeCommand::class,
        \App\Core\Console\Commands\Module\MakeSeederCommand::class,
        \App\Core\Console\Commands\Module\MakeServiceCommand::class,
        \App\Core\Console\Commands\Module\MakeTestCommand::class,
        \App\Core\Console\Commands\Module\MakeTraitCommand::class,
    ];

    public function register(): void
    {
        $this->commands($this->commands);
    }
}
