<?php

namespace LibPoint\Example\TreeStructure;

class TempTreeItemsBuilder
{

    public $items;

    public function __construct($filename)
    {
        $content = file_get_contents($filename);

        $dataArray = json_decode($content,true);

        $this->items = $this->generateItemObjects($dataArray);
    }

    protected function generateItemObjects($dataArray)
    {
        return array_map(function($item){
            return (object) $item;
        }, $dataArray);
    }
}