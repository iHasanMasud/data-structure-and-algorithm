<?php
/**
 * Split Binary Tree
 * Explanation: Given a binary tree, split it into two binary trees, one containing all values less than or equal to the original tree and one containing all values greater than the original tree.
 * Reference: https://www.youtube.com/watch?v=4hvrq9Vp0BA
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

    public function splitBinaryTree($tree)
    {
        $desiredSubtreeSum = $this->getTreeSum($tree)/2;
        $canBeSplit = $this->trySubTrees($tree, $desiredSubtreeSum)[1];

        if ($canBeSplit) {
            return $desiredSubtreeSum;
        } else {
            return 0;
        }
    }

    public function getTreeSum($tree)
    {
        if ($tree === null) {
            return 0;
        }
        return $tree->value + $this->getTreeSum($tree->left) + $this->getTreeSum($tree->right);
    }

    public function trySubTrees($tree, $desiredSubtreeSum)
    {
        if ($tree === null) {
            return [0, false];
        }

        $leftSubtreeSum = $this->trySubTrees($tree->left, $desiredSubtreeSum);
        $rightSubtreeSum = $this->trySubTrees($tree->right, $desiredSubtreeSum);
        $leftCanSplit = $this->trySubTrees($tree->left, $desiredSubtreeSum);
        $rightCanSplit = $this->trySubTrees($tree->right, $desiredSubtreeSum);

        $currentTreeSum = $tree->value + $leftSubtreeSum[0] + $rightSubtreeSum[0];
        $canBeSplit = $leftCanSplit || $rightCanSplit || $currentTreeSum === $desiredSubtreeSum;

        return [$currentTreeSum, $canBeSplit];
    }


}

$tree = new Node(10);
$tree->left = new Node(5);
$tree->right = new Node(15);
$tree->left->left = new Node(2);
$tree->left->right = new Node(5);
$tree->right->right = new Node(22);

print_r($tree->splitBinaryTree($tree));