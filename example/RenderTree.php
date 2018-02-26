<?php
/**
 * Created by PhpStorm.
 * User: mivancic
 * Date: 25/02/2018
 * Time: 05:41
 */

namespace LibPoint\Example\TreeStructure;


class RenderTree
{
    private $treeStructure;
    public function __construct($treeStructure)
    {
        $this->treeStructure = $treeStructure;
    }

    function render()
    {
        echo $this->treeStructure->inner->name . "\n";

        foreach($this->treeStructure->children as $item) {

            echo "-" .$item->inner->name . "\n";

            if ($item->children)
                $this->displayChildren($item->children, '-');
        }
    }

    function displayChildren($children, $sep){
        $del = "-" . $sep;
        foreach($children as $child){

            echo $del . $child->inner->name . "\n";
            if ($child->children)
                $this->displayChildren($child->children, $del . '-');
        }
    }
}