<?php

namespace FelipeDamacenoTeodoro\MakeServiceRepository;

use Illuminate\Support\ServiceProvider;
use FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands\MakeRepository;
use FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands\MakeRepositoryContract;
use FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands\MakeService;
use FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands\MakeServiceContract;
use FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands\MakeServiceRepositoryCrud;

class MakeServiceRepositoryServiceProvider extends ServiceProvider
{
    protected $commands = [
        MakeServiceContract::class,
        MakeService::class,
        MakeRepositoryContract::class,
        MakeRepository::class,
        MakeServiceRepositoryCrud::class,
    ];

    public function boot()
    {
        $this->loadConfigs();

        $this->publishes([
            $this->basePath('config') => config_path()
        ], 'makeservicerepository-config');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom($this->basePath('config/makeservicerepository/base.php'), 'makeservicerepository.base');
    }

    protected function basePath($path = '')
    {
        return __DIR__ . '/../' . $path;
    }
}
