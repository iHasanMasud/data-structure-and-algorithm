<?php
/**
 * Explanation: Given a binary tree, return an array of its node values using in-order traversal, pre-order traversal, and post-order traversal.
 * Reference: https://www.youtube.com/watch?v=WLvU5EQVZqY
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

    public function inOrderTraversal($tree, $array)
    {
        if ($tree !== null) {
            $this->inOrderTraversal($tree->left, $array);
            $array[] = $tree->value;
            $this->inOrderTraversal($tree->right, $array);
        }
        return $array;
    }

    public function preOrderTraversal($tree, $array)
    {
        if ($tree !== null) {
            $array[] = $tree->value;
            $this->preOrderTraversal($tree->left, $array);
            $this->preOrderTraversal($tree->right, $array);
        }
        return $array;
    }

    public function postOrderTraversal($tree, $array)
    {
        if ($tree !== null) {
            $this->postOrderTraversal($tree->left, $array);
            $this->postOrderTraversal($tree->right, $array);
            $array[] = $tree->value;
        }
        return $array;
    }
}

$tree = new Node(10);
$tree->left = new Node(5);
$tree->right = new Node(15);
$tree->left->left = new Node(2);
$tree->left->right = new Node(5);
$tree->right->right = new Node(22);

echo "In-Order Traversal: ";
print_r($tree->inOrderTraversal($tree, []));

echo "Pre-Order Traversal: ";
print_r($tree->preOrderTraversal($tree, []));

echo "Post-Order Traversal: ";
print_r($tree->postOrderTraversal($tree, []));
