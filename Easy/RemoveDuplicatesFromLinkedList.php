<?php
/**
 * Remove Duplicates from Linked List
 * Explanation:
 * Given a sorted linked list, delete all duplicates such that each element appear only once.
 * Example 1:
 * Input: 1->1->2
 * Output: 1->2
 * Algorithm:
 * 1. Check if the head is null or not.
 * 2. If not null, then check if the next node is null or not.
 * 3. If not null, then check if the current node value is equal to the next node value or not.
 * 4. If equal, then set the next node to the next node of the next node.
 * 5. If not equal, then set the current node to the next node.
 * 6. Repeat the process until the next node is null.
 * 7. Return the head.
 */

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }

    public function printList() {
        $current = $this;
        while ($current != null) {
            echo $current->val . " ";
            $current = $current->next;
        }
    }

    public function addNode($val) {
        $current = $this;
        while ($current->next != null) {
            $current = $current->next;
        }
        $current->next = new ListNode($val);
    }

    public function removeDuplicates($linkedList) {
        $current = $linkedList;
        if ($current == null) {
            return $current;
        }
        while ($current->next != null) {
            if ($current->val == $current->next->val) {
                $current->next = $current->next->next;
            } else {
                $current = $current->next;
            }
        }
        return $linkedList;
    }
}

$head = new ListNode(1);
$head->addNode(1);
$head->addNode(2);
$head->addNode(3);
$head->addNode(3);
$head->addNode(4);
$head->addNode(4);
$head->addNode(5);
$head->addNode(5);
$head->addNode(5);
$head->addNode(6);

// Remove Duplicates
$head = $head->removeDuplicates($head);

// Print the list
print_r($head->printList());
