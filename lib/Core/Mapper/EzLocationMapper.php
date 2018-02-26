<?php

namespace LibPoint\TreeStructure\Core\Mapper;

use LibPoint\TreeStructure\API\Mapper;
use LibPoint\TreeStructure\API\Value\TreeItem;

class EzLocationMapper implements Mapper
{
    public function mapTreeItem($element)
    {
        return new TreeItem(
            array(
                "id" => $element->id,
                "parentId" => $element->parentId,
                "inner" => $element
            )
        );
    }
}