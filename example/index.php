<?php

use LibPoint\Example\TreeStructure\RenderTree;
use LibPoint\TreeStructure\Core\Collection\ItemsCollection;
use LibPoint\TreeStructure\Core\Mapper\EzLocationMapper;
use LibPoint\TreeStructure\Core\TreeItemConverter;
use LibPoint\TreeStructure\Core\Service\Builder\CollectionBuilder;
use LibPoint\Example\TreeStructure\TempTreeItemsBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

$filename = __DIR__ . '/menu_items.json';

$tempTreeItemsBuilder = new TempTreeItemsBuilder($filename);
$items = $tempTreeItemsBuilder->items;

$treeItemConverter = new TreeItemConverter(new EzLocationMapper());
$treeItemConverter->convert($items);

$itemsCollection = new ItemsCollection();
foreach($treeItemConverter->items as $item ){
    $itemsCollection->addItem($item, $item->id);
}

$treeStructureBuilder = new CollectionBuilder($itemsCollection, 12234);
$treeStructure = $treeStructureBuilder->build();
//dump($treeStructure);
$renderTree = new RenderTree($treeStructure);

$renderTree->render();
