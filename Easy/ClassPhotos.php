<?php
/**
 * Class Photos
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