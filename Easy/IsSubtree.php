<?php
// Definition for a binary tree node.
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

// Main function to check if `subRoot` is a subtree of `root`.
function isSubtree($root, $subRoot) {
    if ($root === null) return false;
    if (isSameTree($root, $subRoot)) return true;

    // Recursively check the left and right subtrees
    return isSubtree($root->left, $subRoot) || isSubtree($root->right, $subRoot);
}

// Helper function to check if two trees are identical
function isSameTree($r, $s) {
    if ($r === null && $s === null) return true;
    if ($r === null || $s === null) return false;

    // Compare values and recursively check left and right subtrees
    if ($r->val === $s->val) {
        return isSameTree($r->left, $s->left) && isSameTree($r->right, $s->right);
    }
    return false;
}

// Example Usage:

// Creating the main root tree.
$root = new TreeNode(3);
$root->left = new TreeNode(4);
$root->right = new TreeNode(5);
$root->left->left = new TreeNode(1);
$root->left->right = new TreeNode(2);

// Creating the subtree.
$subRoot = new TreeNode(4);
$subRoot->left = new TreeNode(1);
$subRoot->right = new TreeNode(2);

// Check if subRoot is a subtree of root.
var_dump(isSubtree($root, $subRoot));

