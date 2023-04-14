<?php
/**
 * Middle Node
 * Explanation: You're given a Linked List with at least one node. Write a function that returns the middle node of the Linked List.
 * If there are two middle nodes (i.e. an even length list), your function should return the second of these nodes.
 * Reference: https://www.youtube.com/watch?v=wmpivqMlClI
 */

class Node
{
    public $value;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }

    public function middleNode($linkedList)
    {
        $slow = $linkedList;
        $fast = $linkedList;
        $index = 0;
        $middleIndex = 0;

        while ($fast->next != null && $fast->next->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            $index++;
            if ($fast === null || $fast->next === null) {
                $middleIndex = $index;
            } else {
                $middleIndex = $index + 1;
            }
        }

        return $middleIndex;
    }

    public function addNode($value)
    {
        $current = $this;
        while ($current->next != null) {
            $current = $current->next;
        }
        $current->next = new Node($value);
    }


}

$head = new Node(1);
$head->addNode(2);
$head->addNode(3);
$head->addNode(4);
$head->addNode(5);
$head->addNode(6);
$head->addNode(7);

$middleNode = print_r($head->middleNode($head));