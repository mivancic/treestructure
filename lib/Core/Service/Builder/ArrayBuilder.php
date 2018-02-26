<?php

namespace LibPoint\TreeStructure\Core\Service\Builder;

use LibPoint\TreeStructure\API\TreeItemConverter;
use LibPoint\TreeStructure\API\Service\Builder as BuilderInterface;
use LibPoint\TreeStructure\API\Value\TreeItem;
use LibPoint\TreeStructure\Core\Service\AbstractBuilder;

class ArrayBuilder extends AbstractBuilder implements BuilderInterface
{
    protected $treeItems;

    public function __construct(TreeItemConverter $converter)
    {
        $this->treeItems = $converter->items;
    }

    public function build()
    {
        return reset(
            array_filter($this->treeItems,function($treeItem) {

                /** @var TreeItem $parent */
                $parent = $this->findParent($this->treeItems,function($litem) use ($treeItem){

                    return $treeItem->parentId == $litem->id;
                });

                if ($parent){
                    $parent->addChild($treeItem);
                    return false;
                }

                return $treeItem;

            })
        );
    }
}