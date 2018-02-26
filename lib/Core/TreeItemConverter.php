<?php

namespace LibPoint\TreeStructure\Core;

use LibPoint\TreeStructure\API\Mapper;
use LibPoint\TreeStructure\API\TreeItemConverter as TreeItemConverterInterface;

class TreeItemConverter implements TreeItemConverterInterface
{
    public $items;

    public function __construct(Mapper $mapper)
    {
        $this->locationMapper = $mapper;
    }

    public function convert($items)
    {
        $this->items = array_map(function($el) {
            return $this->locationMapper->mapTreeItem($el);
        },$items);
    }
}