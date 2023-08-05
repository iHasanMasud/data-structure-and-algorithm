<?php

/**
 * Min Max Stack Construction
 *
 * Write a MinMaxStack class for a Min Max Stack. The class should support:
 * - Pushing and popping values on and off the stack
 * - Peeking at the value at the top of the stack
 * - Getting both the minimum and the maximum values in the stack at any given point in time
 *
 * All class methods, when considered independently, should run in constant time and with constant space.
 *
 * Reference: https://www.youtube.com/watch?v=WxCuL3jleUA
 */

class MinMaxStack {
    public $stack = [];
    public $minMaxStack = [];

    public function peek() {
        return $this->stack[count($this->stack) - 1];
    }

    public function pop() {
        array_pop($this->minMaxStack);
        return array_pop($this->stack);
    }

    public function push($number) {
        $newMinMax = ['min' => $number, 'max' => $number];
        if (count($this->minMaxStack)) {
            $lastMinMax = $this->minMaxStack[count($this->minMaxStack) - 1];
            $newMinMax['min'] = min($lastMinMax['min'], $number);
            $newMinMax['max'] = max($lastMinMax['max'], $number);
        }
        $this->minMaxStack[] = $newMinMax;
        $this->stack[] = $number;
    }

    public function getMin() {
        return $this->minMaxStack[count($this->minMaxStack) - 1]['min'];
    }

    public function getMax() {
        return $this->minMaxStack[count($this->minMaxStack) - 1]['max'];
    }
}
