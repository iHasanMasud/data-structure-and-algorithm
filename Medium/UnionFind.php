<?php
/**
 * Union Find
 * Explanation: Write a UnionFind class that implements the union find algorithm. This class should support three methods:
 * 1. createSet(value) - Creates a new set containing the provided value.
 * 2. union(set1, set2) - Merges the specified sets into one set.
 * 3. find(value) - Returns the representative value for the set containing the provided value.
 *
 * Reference: https://www.youtube.com/watch?v=ibjEGG7ylHk
 */

class UnionFind
{
    public $parents;
    public $ranks;

    public function __construct($value)
    {
        $this->parents = [];
        $this->ranks = [];
    }

    public function createSet($value)
    {
        $this->parents[$value] = $value;
        $this->ranks[$value] = 0;
    }

    public function find($value)
    {
        if ($this->parents[$value] != $value) {
            $this->parents[$value] = $this->find($this->parents[$value]);
        }
        return $this->parents[$value];
    }

    public function union($value1, $value2)
    {
        if (!isset($this->parents[$value1]) || !isset($this->parents[$value2])) {
            return;
        }
        $p1 = $this->find($value1);
        $p2 = $this->find($value2);

        if($this->ranks[$p1] > $this->ranks[$p2]){
            $this->parents[$p2] = $p1;
            $this->ranks[$p1] += 1;
        }else{
            $this->parents[$p1] = $p2;
            $this->ranks[$p2] += 1;
        }
    }

}

$uf = new UnionFind(1);
$uf->createSet(1);
$uf->createSet(2);
$uf->createSet(3);
$uf->createSet(4);
$uf->createSet(5);
$uf->createSet(6);
$uf->createSet(7);
$uf->createSet(8);
$uf->createSet(9);
$uf->createSet(10);

$uf->union(1, 2);
$uf->union(2, 3);
$uf->union(4, 5);
$uf->union(6, 7);
$uf->union(5, 6);
$uf->union(3, 7);
$uf->union(8, 9);
$uf->union(1, 9);

print_r($uf->parents);
