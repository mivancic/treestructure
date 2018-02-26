<?php

namespace LibPoint\TreeStructure\Core;


use LibPoint\TreeStructure\API\Exception\IdentifierInUseException;
use LibPoint\TreeStructure\API\Exception\InvalidIdentifierException;

abstract class Collection
{
    protected $items = [];

    public function addItem($item, $id)
    {
        if ($id == null) {
            $this->items[] = $item;
        }
        else {
            if (isset($this->items[$id])) {
                throw new IdentifierInUseException('id', "Identifier $id already in use.");
            }
            else {
                $this->items[$id] = $item;
            }
        }
    }

    public function deleteItem($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        else {
            throw new InvalidIdentifierException("id","Unable to delete item with identifier $id.");
        }
    }

    public function getItem($id)
    {
        if (isset($this->items[$id])) {
            return $this->items[$id];
        }
        else {
            throw new InvalidIdentifierException("id","Unable to return item with identifier $id.");
        }
    }

    public function map(callable $fn)
    {
        $result = array();

        foreach ($this as $item) {dump($item);
            $result[] = $fn($item);
        }

        return $result;
    }
}