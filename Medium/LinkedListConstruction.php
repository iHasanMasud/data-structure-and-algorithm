<?php

/**
 * Linked List Construction
 * Write a DoublyLinkedList class that has a head and a tail, both of which point to either a linked list Node or None / null. The class should support:
 * - Setting the head and tail of the linked list.
 * - Inserting nodes before and after other nodes as well as at given positions (the position of the head node is 1).
 * - Removing given nodes and removing nodes with given values.
 * - Searching for nodes with given value
 * Reference: https://www.youtube.com/watch?v=H8-IuKKiQeo
 */

class Node
{
    private $value;
    private $prev;
    private $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->prev = null;
        $this->next = null;
    }
}

class DoublyLinkedList
{
    private $head;
    private $tail;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }

    public function setHead($node)
    {
        if ($this->head == null) {
            $this->head = $node;
            $this->tail = $node;
            return;
        }
        $this->insertBefore($this->head, $node);
    }

    public function setTail($node)
    {
        if ($this->tail == null) {
            $this->setHead($node);
            return;
        }
        $this->insertAfter($this->tail, $node);
    }

    public function insertBefore($node, $nodeToInsert)
    {
        if ($nodeToInsert == $this->head && $nodeToInsert == $this->tail) {
            return;
        }
        $this->remove($nodeToInsert);
        $nodeToInsert->prev = $node->prev;
        $nodeToInsert->next = $node;
        if ($node->prev == null) {
            $this->head = $nodeToInsert;
        } else {
            $node->prev->next = $nodeToInsert;
        }
        $node->prev = $nodeToInsert;
    }

    public function insertAfter($node, $nodeToInsert)
    {
        if ($nodeToInsert == $this->head && $nodeToInsert == $this->tail) {
            return;
        }

        $this->remove($nodeToInsert);
        $nodeToInsert->prev = $node;
        $nodeToInsert->next = $node->next;
        if ($node->next == null) {
            $this->tail = $nodeToInsert;
        } else {
            $node->next->prev = $nodeToInsert;
        }

        $node->next = $nodeToInsert;
    }

    public function insertAtPosition($position, $nodeToInsert)
    {
        if ($position == 1) {
            $this->setHead($nodeToInsert);
            return;
        }

        $node = $this->head;
        $currentPosition = 1;
        while ($node != null && $currentPosition++ != $position) {
            $node = $node->next;
            $currentPosition++;
        }

        if ($node != null) {
            $this->insertBefore($node, $nodeToInsert);
        } else {
            $this->setTail($nodeToInsert);
        }
    }

    public function removeNodesWithValue($value)
    {
        $node = $this->head;
        while ($node != null) {
            $nodeToRemove = $node;
            $node = $node->next;
            if ($nodeToRemove->value == $value) {
                $this->remove($nodeToRemove);
            }
        }
    }

    public function remove($node)
    {
        if ($node == $this->head) {
            $this->head = $this->head->next;
        }

        if ($node == $this->tail) {
            $this->tail = $this->tail->prev;
        }

        $this->removeNodeBindings($node);
    }

    public function containsNodeWithValue($value)
    {
        $node = $this->head;
        while ($node != null && $node->value != $value) {
            $node = $node->next;
        }
        return $node != null;
    }

    private function removeNodeBindings($node)
    {
        if ($node->prev != null) {
            $node->prev->next = $node->next;
        }

        if ($node->next != null) {
            $node->next->prev = $node->prev;
        }

        $node->prev = null;
        $node->next = null;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);

$doublyLinkedList = new DoublyLinkedList();
$doublyLinkedList->setHead($node1);
$doublyLinkedList->setTail($node4);
$doublyLinkedList->insertAfter($node1, $node2);
$doublyLinkedList->insertAfter($node2, $node3);
$doublyLinkedList->insertAtPosition(1, $node4);
$doublyLinkedList->removeNodesWithValue(3);
$doublyLinkedList->remove($node2);
$doublyLinkedList->containsNodeWithValue(3);

print_r($doublyLinkedList);

