<?php
/**
 * Best Seat
 * Explanation: Given a list of integers representing seat availability, where 1 represents a person sitting in that seat,
 * and 0 represents that the seat is empty (0-based). Find the best seat that gives most space to the person sitting in it.
 * Assume that someone is already sitting in the seat and  end of the row.
 * Return the index of the seat.
 * If there are no available seats, return -1.
 * Reference:
 */

$array = [1, 0, 0, 0, 1, 0, 1];

function bestSeat(array $array)
{
    $bestSeat = -1;
    $maxSpace = 0;

    $left = 0;
    while ($left < count($array)) {
        $right = $left + 1;
        while ($right < count($array) && $array[$right] === 0) {
            $right++;
        }

        $availableSpace = $right - $left - 1;
        if ($availableSpace > $maxSpace) {
            $bestSeat = floor(($left + $right) / 2);
            $maxSpace = $availableSpace;
        }

        $left = $right;
    }

    return $bestSeat;
}

print_r(bestSeat($array));