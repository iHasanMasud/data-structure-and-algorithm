<?php
/**
 * Invert Binary Tree
 * Explanation: Given a binary tree, invert it.
 * Reference: https://www.youtube.com/watch?v=OnSn2XEQ4MY
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

    public function invertBinaryTree($tree)
    {
        if ($tree === null) {
            return;
        }

        $this->swapLeftAndRight($tree);
        $this->invertBinaryTree($tree->left);
        $this->invertBinaryTree($tree->right);
    }

    public function swapLeftAndRight($tree)
    {
        $left = $tree->left;
        $tree->left = $tree->right;
        $tree->right = $left;
    }
}

$tree = new Node(1);
$tree->left = new Node(2);
$tree->right = new Node(3);
$tree->left->left = new Node(4);
$tree->left->right = new Node(5);
$tree->right->left = new Node(6);
$tree->right->right = new Node(7);

$tree->invertBinaryTree($tree);

print_r($tree);
