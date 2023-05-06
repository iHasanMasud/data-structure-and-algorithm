<?php
/**
 * Reconstruct BST
 * Explanation: Given a BST, return the original array.
 * Reference: https://www.youtube.com/watch?v=ihj4IQGZ2zc
 */

class Node{
    public $value;
    public $left;
    public $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }

    public function insert($value)
    {
        if ($value < $this->value) {
            if ($this->left === null) {
                $this->left = new Node($value);
            } else {
                $this->left->insert($value);
            }
        } else {
            if ($this->right === null) {
                $this->right = new Node($value);
            } else {
                $this->right->insert($value);
            }
        }
    }

    public function reconstructBst($preOrderTraversalValues)
    {
        $bst = new Node($preOrderTraversalValues[0]);
        for ($i = 1; $i < count($preOrderTraversalValues); $i++) {
            $bst->insert($preOrderTraversalValues[$i]);
        }
        return $bst;
    }
}

$tree = new Node(10);
$tree->insert(4);
$tree->insert(2);
$tree->insert(1);
$tree->insert(5);
$tree->insert(17);
$tree->insert(19);
$tree->insert(18);

$preOrderTraversalValues = [10, 4, 2, 1, 5, 17, 19, 18];

$reconstructedBst = $tree->reconstructBst($preOrderTraversalValues);

print_r($reconstructedBst);