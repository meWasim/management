<?php

namespace App\Core\Console\Commands;

use App\Core\Modules\ModuleManager;
use Illuminate\Console\Command;

class ModuleListCommand extends Command
{
    protected $signature = 'module:list';

    protected $description = 'List all modules and their lifecycle status';

    public function handle(ModuleManager $manager): int
    {
        $rows = [];

        foreach ($manager->available() as $module) {
            $config = $module->config();
            $rows[] = [
                $module->name(),
                ($config['enabled'] ?? false) ? 'enabled' : 'disabled',
                $config['version'] ?? '-',
                $config['description'] ?? 'No description provided.',
            ];
        }

        $this->table(['Module', 'Status', 'Version', 'Description'], $rows);

        return self::SUCCESS;
    }
}
