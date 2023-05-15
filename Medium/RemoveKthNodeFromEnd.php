<?php

/**
 * Remove Kth Node From End
 * Write a function that takes in the head of a Singly Linked List and an integer k (assume that the list has at least k nodes). The function should remove the
 * kth node from the end of the list. Note that every node in the Singly Linked List has a "value" property storing its value as well as a "next" property pointing
 * to the next node in the list or None (null) if it is the tail of the list.
 *
 * Reference: https://www.youtube.com/watch?v=XVuQxVej6y8
 */

class LinkedList
{
    public $value;
    public $next = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function removeKthNodeFromEnd($head, $k)
    {
        $total = 0;
        $node = $head;
        $prev = null;
        $next = null;
        $idx = 0;

        while ($node != null) {
            $node = $node->next;
            $total++;
        }

        $idx = $total - $k;
        $node = $head;

        if ($idx == 0) {
            $this->removeNode(null, $head, $head->next);
        }

        while ($idx > 0) {
            $prev = $node;
            $node = $node->next;
            $next = $node->next;
            $idx--;
        }

        $this->removeNode($prev, $node, $next);
    }

    public function removeNode($prev, $node, $next)
    {
        if ($prev == null) {
            $node->value = $next->value;
            $node->next = $next->next->next;
            return;
        }

        $prev->next = $next;
    }
}

$head = new LinkedList(0);
$head->next = new LinkedList(1);
$head->next->next = new LinkedList(2);
$head->next->next->next = new LinkedList(3);
$head->next->next->next->next = new LinkedList(4);
$head->next->next->next->next->next = new LinkedList(5);
$head->next->next->next->next->next->next = new LinkedList(6);
$head->next->next->next->next->next->next->next = new LinkedList(7);
$head->next->next->next->next->next->next->next->next = new LinkedList(8);
$head->next->next->next->next->next->next->next->next->next = new LinkedList(9);

$head->removeKthNodeFromEnd($head, 4);

$node = $head;
while ($node != null) {
    echo $node->value . " ";
    $node = $node->next;
}

print_r($head);