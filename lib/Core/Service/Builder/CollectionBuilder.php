<?php

namespace LibPoint\TreeStructure\Core\Service\Builder;

use LibPoint\TreeStructure\API\Exception\InvalidIdentifierException;
use LibPoint\TreeStructure\API\Service\Builder as BuilderInterface;
use LibPoint\TreeStructure\API\Value\TreeItem;
use LibPoint\TreeStructure\Core\Collection\ItemsCollection;
use LibPoint\TreeStructure\Core\Service\AbstractBuilder;

class CollectionBuilder extends AbstractBuilder implements BuilderInterface
{
    /** @var ItemsCollection  */
    protected $itemsCollection;

    protected $rootLocationId;

    public function __construct(ItemsCollection $itemsCollection, $rootLocationId)
    {
        $this->itemsCollection = $itemsCollection;
        $this->rootLocationId = $rootLocationId;
    }

    public function build()
    {
        foreach ($this->itemsCollection as $menuItem){

            try{
                /** @var TreeItem $parent */
                $parent = $this->itemsCollection->getItem($menuItem->inner->parentId);
            }
            catch(InvalidIdentifierException $e){
                continue;
            }

            if (!$parent){
                continue;
            }

            $parent->addChild($menuItem);
        }

        $structure = $this->itemsCollection->getItem($this->rootLocationId);

        unset($this->itemsCollection);

        return $structure;
    }
}