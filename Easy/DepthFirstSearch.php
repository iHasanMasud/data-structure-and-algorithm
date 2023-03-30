<?php

/**
 * Depth First Search
 * Explanation: Write a function that takes in a Node class that has a name and an array of optional children nodes.
 * Algorithm: 1. Use recursion to traverse the tree.
 */

class Node
{
    public $name;
    public $children = [];

    public function __construct($name)
    {
        $this->name = $name;
        $this->children = [];
    }

    public function addChild($name)
    {
        $this->children[] = new Node($name);
        return $this;
    }

    public function depthFirstSearch(array $array = [])
    {
        $array[] = $this->name;
        foreach ($this->children as $child) {
            $array = $child->depthFirstSearch($array);
        }
        return $array;
    }
}

$root = new Node('A');
$root->addChild('B')->addChild('C');
$root->children[0]->addChild('D');
$root->children[1]->addChild('E')->addChild('F');
$root->children[0]->children[0]->addChild('G');
$root->children[1]->children[0]->addChild('H');
$root->children[1]->children[1]->addChild('I');
$root->children[0]->children[0]->children[0]->addChild('J');
$root->children[1]->children[0]->children[0]->addChild('K');

print_r($root->depthFirstSearch());






