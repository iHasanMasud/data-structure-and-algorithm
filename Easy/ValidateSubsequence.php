<?php

/**
 * Validate Subsequence
 */

function isValidSubsequence($array, $sequence){
    $seqIdx = 0;
    foreach ($array as $item) {
        if ($seqIdx == count($sequence)) {
            break;
        }
        if ($item == $sequence[$seqIdx]) {
            $seqIdx++;
        }
    }
    return $seqIdx == count($sequence);
}

print_r(isValidSubsequence([5, 1, 22, 25, 6, -1, 8, 10], [1, 6, -1, 10]));