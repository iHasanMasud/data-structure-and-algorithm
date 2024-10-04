<?php
/**
 * Min Height BST
 * Explanation: Given a sorted array, create a BST with minimum height.
 * Reference: https://www.youtube.com/watch?v=OZBvL4LTZgs
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

    public function minHeightBst($array)
    {
        return $this->minHeightBstHelper($array, null, 0, count($array) - 1);
    }

    public function minHeightBstHelper($array, $bst, $startIdx, $endIdx)
    {
        if ($endIdx < $startIdx) {
            return;
        }

        $midIdx = floor(($startIdx + $endIdx) / 2);
        $newBstNode = new Node($array[$midIdx]);

        if ($bst === null) {
            $bst = $newBstNode;
        } else {
            if($array[$midIdx] < $bst->value) {
                $bst->left = $newBstNode;
                $bst = $bst->left;
            } else {
                $bst->right = $newBstNode;
                $bst = $bst->right;
            }
        }

        $this->minHeightBstHelper($array, $bst, $startIdx, $midIdx - 1);
        $this->minHeightBstHelper($array, $bst, $midIdx + 1, $endIdx);
        return $bst;
    }

    public function printTree($tree)
    {
        if ($tree === null) {
            return;
        }

        echo $tree->value . PHP_EOL;
        $this->printTree($tree->left);
        $this->printTree($tree->right);
    }
}

// Print the tree
$tree = new Node(10);
$tree->printTree($tree->minHeightBst([1, 2, 5, 7, 10, 13, 14, 15, 22]));
