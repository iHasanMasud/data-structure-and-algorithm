<?php

/**
 * Sum of Linked Lists
 *
 * You're given two Linked Lists of potentially unequal length. Each Linked List represents a non-negative integer,
 * where each node in the Linked List is a digit of that integer, and the first node in each Linked List always
 * represents the least significant digit of the integer. Write a function that returns the head of a new Linked List
 * that represents the sum of the integers represented by the two input Linked Lists.
 *
 * Each LinkedList node has an integer value as well as a next node pointing to the next node in the list or to
 * None/null if it's the tail of the list. The value of each LinkedList node is always in the range of 0 - 9.
 *
 * Note: your function must create and return a new Linked List, and you're not allowed to modify either of the input
 * Linked Lists.
 *
 * Reference: https://www.youtube.com/watch?v=O0tHq2bNMQQ
 */

class ListNode {
    public $value;
    public $next;

    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}

function sumOfLinkedLists($linkedListOne, $linkedListTwo) {
    $numOne = getListValue($linkedListOne);
    $numTwo = getListValue($linkedListTwo);
    $sumIntegers = str_split((string)($numOne + $numTwo));

    $newList = new ListNode((int)array_pop($sumIntegers));
    $cur = $newList;

    while (!empty($sumIntegers)) {
        $next = new ListNode((int)array_pop($sumIntegers));
        $cur->next = $next;
        $cur = $next;
    }

    return $newList;
}

function getListValue($head) {
    $place = 1;
    $cur = $head;
    $num = 0;

    while ($cur) {
        $num += ($cur->value * $place);
        $place *= 10;
        $cur = $cur->next;
    }

    return $num;
}

// Tests
$ll1 = new ListNode(2);
$ll1->next = new ListNode(4);
$ll1->next->next = new ListNode(7);
$ll1->next->next->next = new ListNode(1);

$ll2 = new ListNode(9);
$ll2->next = new ListNode(4);
$ll2->next->next = new ListNode(5);

$sum = sumOfLinkedLists($ll1, $ll2);
