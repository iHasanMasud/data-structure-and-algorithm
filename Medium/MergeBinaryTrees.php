<?php
/**
 * Merge Binary Tree
 * Explanation: Given two binary trees and imagine that when you put one of them to cover the other, some nodes of the two trees are overlapped while the others are not.
 * Reference: https://www.youtube.com/watch?v=QHH6rIK3dDQ
 */

class BinaryTree{
    public $value;
    public $left;
    public $right;

    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }

    public function mergeBinaryTree($tree1, $tree2){
        if($tree1 == null){
            return $tree2;
        }

        if($tree2 == null){
            return $tree1;
        }

        $tree1->value += $tree2->value;
        $tree1->left = $this->mergeBinaryTree($tree1->left, $tree2->left);
        $tree1->right = $this->mergeBinaryTree($tree1->right, $tree2->right);

        return $tree1;
    }
}

$tree1 = new BinaryTree(1);
$tree1->left = new BinaryTree(2);
$tree1->right = new BinaryTree(3);
$tree1->left->left = new BinaryTree(4);
$tree1->left->right = new BinaryTree(5);
$tree1->right->left = new BinaryTree(6);
$tree1->right->right = new BinaryTree(7);
$tree1->left->left->left = new BinaryTree(8);
$tree1->left->left->right = new BinaryTree(9);
$tree1->left->right->left = new BinaryTree(10);

$tree2 = new BinaryTree(1);
$tree2->left = new BinaryTree(2);
$tree2->right = new BinaryTree(3);
$tree2->left->left = new BinaryTree(4);
$tree2->left->right = new BinaryTree(5);
$tree2->right->left = new BinaryTree(6);
$tree2->right->right = new BinaryTree(7);
$tree2->left->left->left = new BinaryTree(8);
$tree2->left->left->right = new BinaryTree(9);
$tree2->left->right->left = new BinaryTree(10);

$tree1->mergeBinaryTree($tree1, $tree2);
print_r($tree1);