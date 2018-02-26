<?php

use LibPoint\TreeStructure\Core\Mapper\EzLocationMapper;
use LibPoint\TreeStructure\Core\TreeItemConverter;
use LibPoint\TreeStructure\Core\Service\Builder\ArrayBuilder;
use LibPoint\Example\TreeStructure\RenderTree;
use LibPoint\Example\TreeStructure\TempTreeItemsBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

$filename = __DIR__ . '/menu_items.json';

$tempTreeItemsBuilder = new TempTreeItemsBuilder($filename);
$items = $tempTreeItemsBuilder->items;

//Actual usage of library
$treeItemConverter = new TreeItemConverter(new EzLocationMapper());
$treeItemConverter->convert($items);

$treeStructureBuilder = new ArrayBuilder($treeItemConverter);
$treeStructure = $treeStructureBuilder->build();

// Example display structure
$renderTree = new RenderTree($treeStructure);
$renderTree->render();
