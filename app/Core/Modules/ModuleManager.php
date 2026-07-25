<?php

namespace App\Core\Modules;

use Illuminate\Support\Facades\File;

class ModuleManager
{
    /** @var array<string, Module> */
    protected array $modules = [];

    public function __construct()
    {
        $this->reload();
    }

    /**
     * Return every discoverable module, including disabled modules.
     *
     * @return array<string, Module>
     */
    public function available(): array
    {
        $modules = [];
        $path = app_path('Modules');

        if (! File::isDirectory($path)) {
            return $modules;
        }

        foreach (File::directories($path) as $directory) {
            $name = basename($directory);
            $modules[$name] = new Module($name, $directory);
        }

        return $modules;
    }

    /**
     * Load only enabled modules for application bootstrapping.
     */
    public function load(): void
    {
        foreach ($this->available() as $name => $module) {
            if ($module->enabled()) {
                $this->modules[$name] = $module;
            }
        }
    }

    /**
     * Get all enabled modules.
     *
     * @return array<string, Module>
     */
    public function all(): array
    {
        return $this->modules;
    }

    public function get(string $name): ?Module
    {
        return $this->modules[$name] ?? null;
    }

    public function enabled(string $name): bool
    {
        $module = $this->find($name);

        return $module?->enabled() ?? false;
    }

    public function enable(string $name): bool
    {
        return $this->setEnabled($name, true);
    }

    public function disable(string $name): bool
    {
        return $this->setEnabled($name, false);
    }

    public function reload(): void
    {
        $this->modules = [];
        $this->load();
    }

    protected function setEnabled(string $name, bool $enabled): bool
    {
        $module = $this->find($name);

        if ($module === null) {
            return false;
        }

        $config = $module->config();

        if ($config === []) {
            return false;
        }

        $config['enabled'] = $enabled;

        File::put(
            $module->path('module.json'),
            json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).PHP_EOL
        );

        $this->reload();

        return true;
    }

    protected function find(string $name): ?Module
    {
        foreach ($this->available() as $moduleName => $module) {
            if (strcasecmp($moduleName, $name) === 0) {
                return $module;
            }
        }

        return null;
    }
}
