<?php

declare(strict_types=1);

namespace OwenVoke\LaravelArionum\Feature;

use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;
use OwenVoke\LaravelArionum\ArionumFacade;
use OwenVoke\LaravelArionum\ArionumServiceProvider;
use OwenVoke\LaravelArionum\Exceptions\InvalidNodeUri;
use pxgamer\Arionum\Arionum;

final class ArionumServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ArionumServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'Arionum' => ArionumFacade::class,
        ];
    }

    /** @test */
    public function itCanResolveAnArionumInstanceFromTheServiceContainer(): void
    {
        Config::set('arionum.node-uri', 'https://aro.example.com');

        $this->assertInstanceOf(Arionum::class, $this->app->get(Arionum::class));
    }

    /** @test */
    public function itCanAccessFacadeMethods(): void
    {
        Config::set('arionum.node-uri', 'https://aro.example.com');

        $this->assertEquals('https://aro.example.com', ArionumFacade::getNodeAddress());
    }

    /** @test */
    public function itThrowsAnExceptionOnInvalidNodeUri(): void
    {
        $this->expectException(InvalidNodeUri::class);
        $this->expectExceptionMessage('The configured node URI is invalid. A valid `ARIONUM_NODE_URI` variable should be configured in your environment');

        ArionumFacade::getNodeAddress();
    }
}
