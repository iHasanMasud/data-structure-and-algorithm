<?php
/**
 * BST Construction
 * Write a BST class for a Binary Search Tree. The class should support:
 * - Inserting values with the insert method.
 * - Removing values with the remove method; this method should only remove the first instance of a given value.
 * - Searching for values with the contains method.
 * Note that you can't remove values from a single-node tree. In other words, calling the remove method on a single-node tree should simply not do anything.
 * Randomly generate a BST with 15 nodes containing integer values from 0 to 99, inclusive. Remove the values at the indices specified in the array below from the BST.
 * Do this in such a way that after each removal, the BST property is maintained.
 * The removals array is:
 * [10, 4, 1, 17, 0, 18, 5, 15, 2, 19, 11, 14, 6, 16, 7, 12, 8, 13, 9]
 * After removing the values at the indices specified above, the resulting BST should look like this:
 *        50
 *     /    \
 *   30    70
 * /  \  /  \
 * 20 40 60 80
 * Reference for Remove: https://www.youtube.com/watch?v=gcULXE7ViZw
 * Reference for Insert: https://www.youtube.com/watch?v=COZK7NATh4k
 */

class BST
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

    public function insert($value)
    {
        $currentNode = $this;
        while (true) {
            if ($value < $currentNode->value) {
                if ($currentNode->left === null) {
                    $currentNode->left = new BST($value);
                    break;
                } else {
                    $currentNode = $currentNode->left;
                }
            } else {
                if ($currentNode->right === null) {
                    $currentNode->right = new BST($value);
                    break;
                } else {
                    $currentNode = $currentNode->right;
                }
            }
        }
        return $this;
    }

    public function contains($value)
    {
        $currentNode = $this;

        while ($currentNode !== null) {
            if ($value < $currentNode->value) {
                $currentNode = $currentNode->left;
            } elseif ($value > $currentNode->value) {
                $currentNode = $currentNode->right;
            } else {
                return true;
            }
        }

        return $this;
    }

    public function remove($value, $parent = null)
    {
        $currentNode = $this;
        while ($currentNode !== null) {
            if ($value < $currentNode->value) {
                $parent = $currentNode;
                $currentNode = $currentNode->left;
            } elseif ($value > $currentNode->value) {
                $parent = $currentNode;
                $currentNode = $currentNode->right;
            } else {
                if ($currentNode->left !== null && $currentNode->right !== null) {
                    $currentNode->value = $currentNode->right->getMinValue();
                    $currentNode->right->remove($currentNode->value, $currentNode);
                } elseif ($parent === null) {
                    if ($currentNode->left !== null) {
                        $currentNode->value = $currentNode->left->value;
                        $currentNode->right = $currentNode->left->right;
                        $currentNode->left = $currentNode->left->left;
                    } elseif ($currentNode->right !== null) {
                        $currentNode->value = $currentNode->right->value;
                        $currentNode->left = $currentNode->right->left;
                        $currentNode->right = $currentNode->right->right;
                    } else {
                        // single node tree
                    }
                } elseif ($parent->left === $currentNode) {
                    $parent->left = $currentNode->left !== null ? $currentNode->left : $currentNode->right;
                } elseif ($parent->right === $currentNode) {
                    $parent->right = $currentNode->left !== null ? $currentNode->left : $currentNode->right;
                }
                break;
            }
        }

        return $this;
    }

    public function getMinValue()
    {
        $currentNode = $this;
        while ($currentNode->left !== null) {
            $currentNode = $currentNode->left;
        }
        return $currentNode->value;
    }

    public function printTree()
    {
        $queue = new SplQueue();
        $queue->enqueue($this);
        $result = [];
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $result[] = $node->value;
            if ($node->left) {
                $queue->enqueue($node->left);
            }
            if ($node->right) {
                $queue->enqueue($node->right);
            }
        }
        return $result;
    }


}

$bst = new BST(50);
$bst->insert(30)->insert(20)->insert(40)->insert(70)->insert(60)->insert(80);

print_r($bst->printTree());
