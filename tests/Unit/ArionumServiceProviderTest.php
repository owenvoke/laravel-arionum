<?php

namespace pxgamer\LaravelArionum\Unit;

use Orchestra\Testbench\TestCase;
use pxgamer\LaravelArionum\Arionum;
use Illuminate\Support\Facades\Config;
use pxgamer\LaravelArionum\ArionumServiceProvider;
use pxgamer\LaravelArionum\Exceptions\InvalidNodeUri;

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
            'Arionum' => Arionum::class,
        ];
    }

    /** @test */
    public function itCanAccessFacadeMethods(): void
    {
        Config::set('arionum.node-uri', 'https://aro.example.com');

        $this->assertEquals('https://aro.example.com', Arionum::getNodeAddress());
    }

    /** @test */
    public function itThrowsAnExceptionOnInvalidNodeUri(): void
    {
        $this->expectException(InvalidNodeUri::class);
        $this->expectExceptionMessage('The configured node uri is invalid. A valid `ARIONUM_NODE_URI` variable should be configured in your environment');

        Arionum::getNodeAddress();
    }
}
