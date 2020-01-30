<?php

declare(strict_types=1);

namespace OwenVoke\LaravelArionum\Exceptions;

use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;
use RuntimeException;

final class InvalidNodeUri extends RuntimeException implements ProvidesSolution
{
    public static function environmentVariableNotSet(): self
    {
        return new self('The configured node URI is invalid. A valid `ARIONUM_NODE_URI` variable should be configured in your environment');
    }

    public function getSolution(): Solution
    {
        return BaseSolution::create('Your node URI configuration was invalid')
            ->setSolutionDescription('Make sure that your `.env` file contains the node URI (`ARIONUM_NODE_URI`) you are trying to use.');
    }
}
