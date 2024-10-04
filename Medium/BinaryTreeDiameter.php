<?php
/**
 * Binary Tree Diameter
 * Explanation: Given a binary tree, you need to compute the length of the diameter of the tree. The diameter of a binary tree is the length of the longest path between any two nodes in a tree.
 * Reference: https://www.youtube.com/watch?v=bkxqA8Rfv04
 */

class Node
{
    public $data;
    public $left;
    public $right;

    public function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = null;
    }

    public function calculateDiameter($tree, $diameter)
    {
        if ($tree == null) {
            return 0;
        }

        $leftHeight = $this->calculateDiameter($tree->left, $diameter);
        $rightHeight = $this->calculateDiameter($tree->right, $diameter);

        $diameter['max'] = max($leftHeight + $rightHeight, $diameter['max']);

        return max($leftHeight + 1, $rightHeight + 1);
    }

    public function binaryTreeDiameter($tree)
    {
        $diameter = ['max' => -INF];
        $this->calculateDiameter($tree, $diameter);
        return $diameter['max'];
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);

$diameter = $root->binaryTreeDiameter($root); // 3

print_r($diameter);
