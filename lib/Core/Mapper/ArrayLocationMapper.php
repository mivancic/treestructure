<?php

namespace LibPoint\TreeStructure\Core\Mapper;

use LibPoint\TreeStructure\API\Service\Mapper;
use LibPoint\TreeStructure\API\Value\TreeItem;

class ArrayLocationMapper implements Mapper
{
    public function mapTreeItem($element)
    {
        return new TreeItem(
            array(
                "id" => $element['id'],
                "parentId" => $element['parent_id'],
                "inner" => $element
            )
        );
    }
}