<?php

namespace LibPoint\TreeStructure\API\Value;

use LibPoint\TreeStructure\API\Exception\InvalidIdentifierException;

abstract class ValueObject
{
    public function __construct(array $properties = array())
    {
        foreach ($properties as $property => $value) {
            if (!property_exists($this, $property)) {
                throw new InvalidIdentifierException(
                    'properties',
                    'Property "' . $property . '" does not exist in "' . get_class($this) . '" class.'
                );
            }

            $this->$property = $value;
        }
    }
}