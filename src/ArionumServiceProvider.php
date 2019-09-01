<?php

namespace pxgamer\LaravelArionum;

use Illuminate\Support\ServiceProvider;
use pxgamer\Arionum\Arionum as ArionumAdapter;
use pxgamer\LaravelArionum\Exceptions\InvalidNodeUri;
use pxgamer\LaravelArionum\Console\Commands\ArionumStatisticsCommand;

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
        $this->app->singleton(ArionumAdapter::class, function () {
            if (! $this->app->get('config')->get('arionum.node-uri')) {
                throw InvalidNodeUri::environmentVariableNotSet();
            }

            return new ArionumAdapter($this->app->get('config')->get('arionum.node-uri'));
        });

        $this->app->alias(ArionumAdapter::class, 'arionum');
    }
}
