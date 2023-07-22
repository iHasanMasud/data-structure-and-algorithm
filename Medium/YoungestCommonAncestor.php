<?php

/**
 * Youngest Common Ancestor
 * You're given three inputs, all of which are instances of an AncestralTree class that have an ancestor property pointing to their youngest ancestor.
 * The first input is the top ancestor in an ancestral tree (i.e., the only instance that has no ancestor--its ancestor property points to None / null), and the other two inputs are descendants in the ancestral tree.
 * Write a function that returns the youngest common ancestor to the two descendants.
 * Note that a descendant is considered its own ancestor. So in the simple ancestral tree below, the youngest common ancestor to nodes A and B is node A.
 *
 * Reference: https://www.youtube.com/watch?v=gs2LMfuOR9k
 */

class AncestralTree {
    public $name;
    public $ancestor;

    public function __construct($name) {
        $this->name = $name;
        $this->ancestor = null;
    }

    public function getYoungestCommonAncestor($topAncestor, $descendantOne, $descendantTwo) {
        $map = [];
        $current = $descendantOne;
        while ($current != null) {
            $map[$current->name] = true;
            $current = $current->ancestor;
        }

        $current = $descendantTwo;

        while ($current != null) {
            if (isset($map[$current->name])) {
                return $current;
            }
            $current = $current->ancestor;
        }

        return false;
    }
}

$A = new AncestralTree('A');
$B = new AncestralTree('B');
$C = new AncestralTree('C');
$D = new AncestralTree('D');
$E = new AncestralTree('E');
$F = new AncestralTree('F');
$G = new AncestralTree('G');
$H = new AncestralTree('H');
$I = new AncestralTree('I');

$A->ancestor = null;
$B->ancestor = $A;

$C->ancestor = $A;
$D->ancestor = $B;
$E->ancestor = $B;
$F->ancestor = $C;
$G->ancestor = $C;
$H->ancestor = $D;
$I->ancestor = $D;

$topAncestor = $A;
$descendantOne = $E;
$descendantTwo = $I;

$youngestCommonAncestor = $A->getYoungestCommonAncestor($topAncestor, $descendantOne, $descendantTwo);
print_r($youngestCommonAncestor->name . "\n"); // B

