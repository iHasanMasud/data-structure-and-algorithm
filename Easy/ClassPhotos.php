<?php
/**
 * Class Photos
 * Explanation: Write a function that takes in two arrays of positive integers.
 * Each array represents a row of students in a class, where each integer in the array is the height of that student in inches.
 * Your function should return a boolean representing whether a class photo that follows the guidelines below can be taken.
 * Algorithm: Sort the arrays and compare the first elements of each array.
 */

function classPhotos($redShirtHeights, $blueShirtHeights) {
    rsort($redShirtHeights);
    rsort($blueShirtHeights);
    $redShirtFirst = $redShirtHeights[0] < $blueShirtHeights[0];
    for ($i = 0; $i < count($redShirtHeights); $i++) {
        if ($redShirtFirst) {
            if ($redShirtHeights[$i] >= $blueShirtHeights[$i]) {
                return false;
            }
        } else {
            if ($blueShirtHeights[$i] >= $redShirtHeights[$i]) {
                return false;
            }
        }
    }
    return true;
}

$redShirtHeights = [5, 8, 1, 3, 4];
$blueShirtHeights = [6, 9, 2, 4, 5];

print_r(classPhotos($redShirtHeights, $blueShirtHeights));