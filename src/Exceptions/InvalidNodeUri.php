<?php

namespace pxgamer\LaravelArionum\Exceptions;

use RuntimeException;

final class InvalidNodeUri extends RuntimeException
{
    public static function environmentVariableNotSet(): self
    {
        return new self('The configured node uri is invalid. A valid `ARIONUM_NODE_URI` variable should be configured in your environment');
    }
}
