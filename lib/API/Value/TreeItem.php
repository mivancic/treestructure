<?php

namespace LibPoint\TreeStructure\API\Value;

class TreeItem extends ValueObject
{
    public $id;

    public $parentId;

    public $inner;

    public $children;

    public function addChild(TreeItem $item)
    {
        $this->children[] = $item;

        return $this;
    }

    public function getChildren()
    {
        return $this->children;
    }
}