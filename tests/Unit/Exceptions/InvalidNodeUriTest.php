<?php

namespace pxgamer\LaravelArionum\Unit\Exceptions;

use Orchestra\Testbench\TestCase;
use Facade\IgnitionContracts\BaseSolution;
use pxgamer\LaravelArionum\Exceptions\InvalidNodeUri;

final class InvalidNodeUriTest extends TestCase
{
    /** @test */
    public function itReturnsValidExceptionDetailsWhenTheEnvironmentVariableIsNotSet(): void
    {
        $this->expectException(InvalidNodeUri::class);
        $this->expectExceptionMessage('The configured node URI is invalid. A valid `ARIONUM_NODE_URI` variable should be configured in your environment');

        throw InvalidNodeUri::environmentVariableNotSet();
    }

    /** @test */
    public function itReturnsAValidSolutionForTheException(): void
    {
        $solution = InvalidNodeUri::environmentVariableNotSet()->getSolution();

        $this->assertInstanceOf(BaseSolution::class, $solution);
        $this->assertEquals('Your node URI configuration was invalid', $solution->getSolutionTitle());
        $this->assertEquals('Make sure that your `.env` file contains the node URI (`ARIONUM_NODE_URI`) you are trying to use.', $solution->getSolutionDescription());
    }
}
