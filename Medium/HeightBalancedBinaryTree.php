<?php
/**
 * Height Balanced Binary Tree
 * Explanation: Write a function that takes in a Binary Tree and returns a boolean representing whether the tree is height-balanced.
 * A height-balanced binary tree is a binary tree in which the depth of the left subtree and the depth of the right subtree of every node never differ by more than 1.
 * A node is said to be height-balanced if its left and right subtrees are height-balanced.
 * Each BinaryTree node has an integer value, a left child node, and a right child node. Children nodes can either be BinaryTree nodes themselves or None / null.
 * Reference: https://www.youtube.com/watch?v=QfJsau0ItOY
 * Reference: https://www.youtube.com/watch?v=bh4eb_6SwRA
 */

class BinaryTree
{
    public $value;
    public $left;
    public $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }

    public function heightBalancedBinaryTree($tree)
    {
        $balance = ['isBalanced' => true];
        $this->calculateHeight($tree, 0, $balance);
        return $balance['isBalanced'];

    }

    public function calculateHeight($tree, $height, $balance)
    {
        if ($tree == null) {
            return $height;
        }

        $leftHeight = $this->calculateHeight($tree->left, $height + 1, $balance);
        $rightHeight = $this->calculateHeight($tree->right, $height + 1, $balance);

        if (abs($leftHeight - $rightHeight) > 1) {
            $balance['isBalanced'] = false;
        }

        return max($leftHeight, $rightHeight);
    }
}

$tree = new BinaryTree(1);
$tree->left = new BinaryTree(2);
$tree->right = new BinaryTree(3);
$tree->left->left = new BinaryTree(4);
$tree->left->right = new BinaryTree(5);
$tree->right->left = new BinaryTree(6);
$tree->right->right = new BinaryTree(7);
$tree->left->left->left = new BinaryTree(8);
$tree->left->left->right = new BinaryTree(9);
$tree->left->right->left = new BinaryTree(10);

print_r($tree->heightBalancedBinaryTree($tree)); // 1