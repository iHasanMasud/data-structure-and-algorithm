<?php
/**
 * Find Kth Largest Value In BST
 * Explanation: Given a BST, find the kth largest value.
 * Reference: https://www.youtube.com/watch?v=UxZU0K8dPm0
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

    public function findKthLargestValueInBst($tree, $k)
    {
        $array = [];
        $this->inOrderTraverse($tree, $array);
        return $array[count($array) - $k];
    }

    public function inOrderTraverse($tree, &$array)
    {
        if ($tree === null) {
            return;
        }

        $this->inOrderTraverse($tree->left, $array);
        $array[] = $tree->value;
        $this->inOrderTraverse($tree->right, $array);
    }
}

$tree = new Node(15);
$tree->insert(5);
$tree->insert(20);
$tree->insert(2);
$tree->insert(5);
$tree->insert(17);
$tree->insert(22);
$tree->insert(1);
$tree->insert(3);
$tree->insert(4);
$tree->insert(6);
$tree->insert(13);
$tree->insert(18);

print_r($tree->findKthLargestValueInBst($tree, 3)); // 18