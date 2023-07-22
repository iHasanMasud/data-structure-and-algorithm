<?php

/**
 * Breadth First Search
 * You're given a Node class that has a name and an array of optional children nodes. When put together, nodes form
 * an acyclic tree-like structure.
 * Implement the breadthFirstSearch method on the Node class, which takes in an empty array, traverses the tree using
 * the Breadth-first Search approach (specifically navigating the tree from left to right), stores all of the nodes'
 * names in the input array, and returns it.
 * Reference: https://www.youtube.com/watch?v=qul0f79gxGs
 */

class Node {
    public $name;
    public $children = [];

    public function __construct($name) {
        $this->name = $name;
        $this->children = [];
    }

    public function addChild($name) {
        $this->children[] = new Node($name);
        return $this;
    }

    public function breadthFirstSearch($array = []) {
        $nodes = [$this];

        while (count($nodes) > 0) {
            $currentNode = array_shift($nodes);
            $array[] = $currentNode->name;
            foreach ($currentNode->children as $child) {
                $nodes[] = $child;
            }
        }

        return $array;
    }
}

$node = new Node('A');
$node->addChild('B')->addChild('C')->addChild('D');
$node->children[0]->addChild('E')->addChild('F');
$node->children[2]->addChild('G')->addChild('H');
$node->children[0]->children[1]->addChild('I')->addChild('J');
$node->children[2]->children[0]->addChild('K');

print_r($node->breadthFirstSearch()); // [A, B, C, D, E, F, G, H, I, J, K]
