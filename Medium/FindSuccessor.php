<?php
/**
 * Find Successor
 * Explanation: Write a function that takes in a Binary Tree (where nodes have an additional pointer to their parent node) as well as a node contained in that tree and returns the given node's successor.
 * Reference: https://www.youtube.com/watch?v=psFKTGahpCs
 */

class Node
{
    public $value;
    public $left;
    public $right;
    public $parent;

    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
        $this->parent = null;
    }

    public function findSuccessor($tree, $node)
    {
        $stack = [];
        $allNodes = [];
        $currentNode = $tree;

        while (!empty($stack) || $currentNode != null) {
            if ($currentNode != null) {
                $stack[] = $currentNode;
                $currentNode = $currentNode->left;
            } else {
                $currentNode = array_pop($stack);
                $allNodes[] = $currentNode;
                $currentNode = $currentNode->right;
            }
        }

        $index = array_search($node, $allNodes);

        return $allNodes[$index + 1];
    }
}

$tree = new Node(1);
$tree->left = new Node(2);
$tree->right = new Node(3);
$tree->left->left = new Node(4);
$tree->left->right = new Node(5);
$tree->left->left->left = new Node(6);
$tree->left->left->right = new Node(7);
$tree->left->right->right = new Node(8);
$tree->left->right->right->left = new Node(9);
$tree->left->right->right->right = new Node(10);
$tree->left->left->left->left = new Node(11);

$node = $tree->left->right->right->right;
$successor = $tree->findSuccessor($tree, $node);

print_r($successor->value);