<?php
/**
 * Min Heap Construction
 * Implement a MinHeap class that supports:
 * - Building a Min Heap from an input array of integers.
 * - Inserting integers in the heap.
 * - Removing the heap's minimum / root value.
 * - Peeking at the heap's minimum / root value.
 *
 * Note that the heap should be represented in the form of an array.
 *
 * Reference: https://www.youtube.com/watch?v=kiCBi34k-Kg
 * Reference: https://www.youtube.com/watch?v=t0Cq6tVNRBA
 */

class MinHeap
{
    private $heap = [];

    public function __construct(array $array)
    {
        $this->heap = $this->buildHeap($array);
    }

    public function size($heap = null)
    {
        if ($heap === null) {
            $heap = $this->heap;
        }
        return count($heap) - 1;
    }

    public function getLeftChildIdx($parentIdx)
    {
        return 2 * $parentIdx + 1;
    }

    public function getRightChildIdx($parentIdx)
    {
        return 2 * $parentIdx + 2;
    }

    public function getParentIdx($childIdx)
    {
        return floor(($childIdx - 1) / 2);
    }

    public function hasLeftChild($idx, $heap = null)
    {
        if ($heap === null) {
            $heap = $this->heap;
        }
        return $this->getLeftChildIdx($idx) <= $this->size($heap);
    }

    public function hasRightChild($idx, $heap = null)
    {
        if ($heap === null) {
            $heap = $this->heap;
        }
        return $this->getRightChildIdx($idx) <= $this->size($heap);
    }

    public function hasParent($idx)
    {
        return $this->getParentIdx($idx) >= 0;
    }

    public function leftChild($idx, $heap = null)
    {
        if ($heap === null) {
            $heap = $this->heap;
        }
        return $heap[$this->getLeftChildIdx($idx)];
    }

    public function rightChild($idx, $heap = null)
    {
        if ($heap === null) {
            $heap = $this->heap;
        }
        return $heap[$this->getRightChildIdx($idx)];
    }

    public function parent($idx, $heap = null)
    {
        if ($heap === null) {
            $heap = $this->heap;
        }
        return $heap[$this->getParentIdx($idx)];
    }

    public function swap($i, $j, &$heap)
    {
        list($heap[$i], $heap[$j]) = array($heap[$j], $heap[$i]);
    }

    public function buildHeap($array)
    {
        $firstParentIdx = $this->getParentIdx(count($array) - 1);

        for ($currentIdx = $firstParentIdx; $currentIdx >= 0; $currentIdx--) {
            $this->siftDown($currentIdx, count($array) - 1, $array);
        }

        return $array;
    }

    public function siftDown($idx = 0, $endIdx = null, &$heap = null)
    {
        if ($endIdx === null) {
            $endIdx = $this->size($heap);
        }

        if ($heap === null) {
            $heap = $this->heap;
        }

        while ($this->hasLeftChild($idx, $heap)) {
            $smallerChildIdx = $this->getLeftChildIdx($idx);
            if ($this->hasRightChild($idx, $heap) && $this->rightChild($idx, $heap) < $heap[$smallerChildIdx]) {
                $smallerChildIdx = $this->getRightChildIdx($idx);
            }

            if ($heap[$idx] < $heap[$smallerChildIdx]) {
                return;
            } else {
                $this->swap($idx, $smallerChildIdx, $heap);
                $idx = $smallerChildIdx;
            }
        }
    }

    public function siftUp($idx = null, &$heap = null)
    {
        if ($idx === null) {
            $idx = $this->size($heap);
        }

        if ($heap === null) {
            $heap = $this->heap;
        }

        while ($this->hasParent($idx) && $heap[$idx] < $this->parent($idx, $heap)) {
            $parentIdx = $this->getParentIdx($idx);
            $this->swap($idx, $parentIdx, $heap);
            $idx = $parentIdx;
        }
    }

    public function peek()
    {
        return $this->heap[0];
    }

    public function remove()
    {
        $this->swap(0, $this->size(), $this->heap);
        $valueToRemove = array_pop($this->heap);
        $this->siftDown(0);
        return $valueToRemove;
    }

    public function insert($value)
    {
        $this->heap[] = $value;
        $this->siftUp();
    }
}

$minHeap = new MinHeap([48, 12, 24, 7, 8, -5, 24, 391, 24, 56, 2, 6, 8, 41]);

print_r($minHeap->peek()); // -5