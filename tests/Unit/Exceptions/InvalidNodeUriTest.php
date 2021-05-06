<?php

declare(strict_types=1);

use Facade\IgnitionContracts\BaseSolution;
use OwenVoke\LaravelArionum\Exceptions\InvalidNodeUri;

it('returns valid exception details when the environment variable is not set', function (): void {
    throw InvalidNodeUri::environmentVariableNotSet();
})->throws(
    InvalidNodeUri::class,
    'The configured node URI is invalid. A valid `ARIONUM_NODE_URI` variable should be configured in your environment'
);

it('returns a valid solution for the exception', function (): void {
    $solution = InvalidNodeUri::environmentVariableNotSet()->getSolution();

    expect($solution)->toBeInstanceOf(BaseSolution::class);
    expect($solution->getSolutionTitle())->toEqual('Your node URI configuration was invalid');
    expect($solution->getSolutionDescription())->toEqual('Make sure that your `.env` file contains the node URI (`ARIONUM_NODE_URI`) you are trying to use.');
});
