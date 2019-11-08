<?php

declare(strict_types=1);

namespace pxgamer\LaravelArionum;

use Illuminate\Support\ServiceProvider;
use pxgamer\Arionum\Arionum;
use pxgamer\LaravelArionum\Console\Commands\ArionumStatisticsCommand;
use pxgamer\LaravelArionum\Exceptions\InvalidNodeUri;

final class ArionumServiceProvider extends ServiceProvider
{
    private const CONFIG_FILE = __DIR__.'/../config/arionum.php';

    public function boot(): void
    {
        $this->publishes([
            self::CONFIG_FILE => $this->app->configPath('arionum.php'),
        ], 'config');

        $this->mergeConfigFrom(self::CONFIG_FILE, 'arionum');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ArionumStatisticsCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        $this->app->singleton(Arionum::class, function () {
            if (! $this->app->get('config')->get('arionum.node-uri')) {
                throw InvalidNodeUri::environmentVariableNotSet();
            }

            return new Arionum($this->app->get('config')->get('arionum.node-uri'));
        });

        $this->app->alias(Arionum::class, 'arionum');
    }
}
