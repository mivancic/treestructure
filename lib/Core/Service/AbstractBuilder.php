<?php

namespace LibPoint\TreeStructure\Core\Service;


class AbstractBuilder
{
    protected function findParent($items, $callable) {
        foreach ($items as $el) {
            if (call_user_func($callable, $el) === true)
                return $el;
        }
        return null;
    }
}