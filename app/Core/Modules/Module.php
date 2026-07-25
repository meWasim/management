<?php

namespace App\Core\Modules;

use Illuminate\Support\Facades\File;

class Module
{
    public function __construct(
        protected string $name,
        protected string $path
    ) {
    }


    public function name(): string
    {
        return $this->name;
    }


    public function path(string $path = ''): string
    {
        return $this->path .
            ($path ? DIRECTORY_SEPARATOR . $path : '');
    }


    public function namespace(): string
    {
        return "App\\Modules\\{$this->name}";
    }


    /**
     * Check if module is enabled
     */
    public function enabled(): bool
    {
        return $this->config()['enabled'] ?? false;
    }


    /**
     * Get module configuration
     */
    public function config(): array
    {
        $config = $this->path('module.json');


        if (!File::exists($config)) {
            return [];
        }


        return json_decode(
            File::get($config),
            true
        ) ?: [];
    }
}
