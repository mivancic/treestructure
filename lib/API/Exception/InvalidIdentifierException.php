<?php

namespace LibPoint\TreeStructure\API\Exception;

use Exception as BaseException;

class InvalidIdentifierException extends Exception
{
    public function __construct($argument, $whatIsWrong, BaseException $previousException = null)
    {
        parent::__construct(
            'Invalid argument "' . $argument . '". ' . $whatIsWrong,
            0,
            $previousException
        );
    }
}