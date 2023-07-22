<?php
/**
 * Symmetrical Tree
 * Explanation: Given a binary tree, check whether it is a mirror of itself (ie, symmetric around its center).
 * Reference:https://www.youtube.com/watch?v=Mao9uzxwvmc
 */
class SymmetricalTree
{
    public $value;
    public $left;
    public $right;

    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }

    public function symmetricalTree($tree)
    {
        return $this->treesAreMirrored($tree->left, $tree->right);
    }

    public function treesAreMirrored($left, $right)
    {
        if ($left == null && $right == null) {
            return $left == $right;
        }

        if ($left->value != $right->value) {
            return false;
        }

        return $this->treesAreMirrored($left->left, $right->right) && $this->treesAreMirrored($left->right, $right->left);
    }
}

$tree = new SymmetricalTree(1);
$tree->left = new SymmetricalTree(2);
$tree->right = new SymmetricalTree(2);
$tree->left->left = new SymmetricalTree(3);
$tree->left->right = new SymmetricalTree(4);
$tree->right->left = new SymmetricalTree(4);
$tree->right->right = new SymmetricalTree(3);

print_r($tree->symmetricalTree($tree));

