<?php
/**
 * Tandem Bicycle
 */

function tandemBicycle($redShirtSpeeds, $blueShirtSpeeds, $fastest) {
    $totalSpeed = 0;
    sort($redShirtSpeeds);
    sort($blueShirtSpeeds);
    if($fastest){
        rsort($blueShirtSpeeds);
    }

    for($i = 0; $i < count($redShirtSpeeds); $i++){
        $totalSpeed += max($redShirtSpeeds[$i], $blueShirtSpeeds[$i]);
    }
    return $totalSpeed;
}

$redShirtSpeeds = [5, 5, 3, 9, 2];
$blueShirtSpeeds = [3, 6, 7, 2, 1];
$fastest = true;

print_r(tandemBicycle($redShirtSpeeds, $blueShirtSpeeds, $fastest));