<?php

/**
 * Merging Linked Lists
 *
 * You're given two Linked Lists of potentially unequal length. These Linked Lists potentially merge at a
 * shared intersection node. Write a function that returns the intersection node or returns None/null if there is
 * no intersection.
 *
 * Each Linked List node has an integer value as well as a next node pointing to the next node in the list or to None/null
 * if it's the tail of the list.
 *
 * Note: Your function should return an existing node. It should not modify either Linked List, and should not create any new Linked List nodes.
 *
 * Reference: https://www.youtube.com/watch?v=XIdigk956u0
 */


class LinkedList {
    public $value;
    public $next;

    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }

    public function mergingLinkedLists($linkedListOne, $linkedListTwo)
    {
        $first = $linkedListOne;
        $second = $linkedListTwo;

        while ($first !== $second) {
            $first = $first === null ? $linkedListTwo : $first->next;
            $second = $second === null ? $linkedListOne : $second->next;
        }

        return $first;
    }
}
