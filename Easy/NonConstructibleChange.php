<?php
/**
 * Non-Constructible Change
 * First, sort the array in ascending order.
 * Then, loop through the array and check if the current coin is greater than the minimum change + 1.
 * If it is, then return the minimum change + 1.
 * Otherwise, add the current coin to the minimum change.
 * Finally, return the minimum change + 1.
 */

function nonConstructibleChange($coins)
{
    sort($coins);
    $minChange = 0;

    foreach ($coins as $coin) {
        if ($coin > $minChange + 1) {
            return $minChange + 1;
        }
        $minChange += $coin;
    }

    return $minChange + 1;
}

print_r(nonConstructibleChange([5, 7, 1, 1, 2, 3, 22]));