<?php
/**
 * Sunset Views
 *
 * Given an array of buildings and a direction that all the buildings face, return an array of the indices of the buildings that can see the sunset.
 *
 * A building can see the sunset if it's strictly taller than all the buildings that come after it in the direction that it faces.
 *
 * The input array named buildings contains positive, non-zero integers representing the heights of the buildings. A building at index i
 * thus has a height denoted by buildings[i]. All the buildings face the same direction, and this direction is either east or west,
 * denoted by the input string named direction, which will always be equal to either "EAST" or "WEST". In relation to the input array,
 * you can interpret these directions as right for east and left for west.
 * Important note: the indices in the output array should be sorted in ascending order.
 *
 */

function sunsetViews(array $buildings, string $direction): array
{
    $result = [];
    $max = 0;
    $i = $direction === 'EAST' ? count($buildings) - 1 : 0;
    $step = $direction === 'EAST' ? -1 : 1;
    while ($i >= 0 && $i < count($buildings)) {
        if ($buildings[$i] > $max) {
            $result[] = $i;
            $max = $buildings[$i];
        }
        $i += $step;
    }
    return $direction === 'EAST' ? array_reverse($result) : $result;
}

$buildings = [3, 5, 4, 4, 3, 1, 3, 2];
$direction = 'EAST';

print_r(sunsetViews($buildings, $direction)); // [1, 3, 6, 7]