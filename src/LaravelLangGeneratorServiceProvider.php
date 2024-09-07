<?php

namespace Glebsky\LaravelLangGenerator;

use Glebsky\LaravelLangGenerator\Commands\LangGeneratorCommand;
use Illuminate\Support\ServiceProvider as ServiceProviderAlias;

class LaravelLangGeneratorServiceProvider extends ServiceProviderAlias
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/lang-generator.php', 'lang-generator');

        if ($this->app->runningInConsole()) {
            $this->commands([
                LangGeneratorCommand::class,
            ]);
        }
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/lang-generator.php' => config_path('lang-generator.php'),
        ], 'config');
    }
}
