<?php
/**
 * Validate BST
 * Explanation: Given a binary tree, determine if it is a valid binary search tree (BST).
 * Reference: https://www.youtube.com/watch?v=s6ATEkipzow
 */

class Node
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

    public function validateBst($tree)
    {
        return $this->validateBstHelper($tree, -INF, INF);
    }

    public function validateBstHelper($tree, $minValue, $maxValue)
    {
        if ($tree === null) {
            return true;
        }

        if ($tree->value < $minValue || $tree->value >= $maxValue) {
            return false;
        }

        $leftIsValid = $this->validateBstHelper($tree->left, $minValue, $tree->value);
        return $leftIsValid && $this->validateBstHelper($tree->right, $tree->value, $maxValue);
    }

}


$tree = new Node(10);
$tree->left = new Node(5);
$tree->right = new Node(15);
$tree->left->left = new Node(2);
$tree->left->right = new Node(5);
$tree->right->right = new Node(22);

echo $tree->validateBst($tree);