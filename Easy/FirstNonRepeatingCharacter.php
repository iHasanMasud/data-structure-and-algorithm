<?php
/**
 * First Non-Repeating Character
 * Explanation: https://www.youtube.com/watch?v=5co5Gvp_-S0
 * Example: "abcdcaf" => "b"
 */

$string = "abcdcaf";
function firstNonRepeatingCharacter($string)
{
    $characters = [];
    for ($i = 0; $i < strlen($string); $i++){
        $char = $string[$i];
        if (!array_key_exists($char, $characters)) {
            $characters[$char] = 1;
        }else{
            $characters[$char]++;
        }
    }

    foreach ($characters as $char => $count) {
        if ($count === 1) {
            return $char;
        }
    }

    return -1;
}

print_r(firstNonRepeatingCharacter($string));