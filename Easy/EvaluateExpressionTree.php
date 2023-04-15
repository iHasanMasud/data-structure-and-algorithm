<?php
/**
 * Evaluate Expression Tree
 * Explanation: You're given a Binary Tree that represents an expression. Write a function that evaluates the expression and returns the result.
 * Reference: https://www.youtube.com/watch?v=2tpcqDmvJBU
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

    public function evaluateExpressionTree($expressionTree)
    {
        if ($expressionTree->left === null && $expressionTree->right === null) {
            return $expressionTree->value;
        }

        $left = $this->evaluateExpressionTree($expressionTree->left);
        $right = $this->evaluateExpressionTree($expressionTree->right);

        return match ($expressionTree->value) {
            -1 => $left + $right,
            -2 => $left - $right,
            -3 => $left * $right,
            -4 => (int)$left / $right,
            default => $left * $right,
        };
    }

    public function addNode($value)
    {
        $current = $this;
        while ($current->left != null && $current->right != null) {
            $current = $current->left;
        }
        if ($current->left === null) {
            $current->left = new Node($value);
        } else {
            $current->right = new Node($value);
        }
    }
}

$head = new Node(-1);
$head->addNode(-2);
$head->addNode(-3);
$head->addNode(3);
$head->addNode(2);
$head->addNode(4);
$head->addNode(5);


echo $head->evaluateExpressionTree($head);
