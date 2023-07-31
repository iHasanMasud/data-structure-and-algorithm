<?php

/**
 * Phone Number Mnemonics
 *
 * Given an N digit phone number, print all the strings that can be made from that phone number.
 * Since 1 and 0 don't correspond to any characters, replace them with 1 and 0 respectively.
 *
 * Reference: https://www.youtube.com/watch?v=0snEunUacZY
 *
 * For example:
 * 213 => A1D, A1E, A1F, B1D, B1E, B1F, C1E, C1E, C1F
 */

function phoneNumberMnemonics($phoneNumber)
{
    $currentMnemonics = array_fill(0, strlen($phoneNumber), '0');
    $mnemonicsFound = [];

    phoneNumberMnemonicsHelper(0, $phoneNumber, $currentMnemonics, $mnemonicsFound);

    return $mnemonicsFound;
}

function phoneNumberMnemonicsHelper($idx, $phoneNumber, &$currentMnemonics, &$mnemonicsFound)
{

    if ($idx == strlen($phoneNumber)) {
        $mnemonics = implode('', $currentMnemonics);
        $mnemonicsFound[] = $mnemonics;
    } else {
        $digit = $phoneNumber[$idx];
        $letters = getLetters($digit);
        foreach ($letters as $letter) {
            $currentMnemonics[$idx] = $letter;
            phoneNumberMnemonicsHelper($idx + 1, $phoneNumber, $currentMnemonics, $mnemonicsFound);
        }
    }
}

function getLetters($digit)
{
    $digitLetters = [
        0 => ['0'],
        1 => ['1'],
        2 => ['A', 'B', 'C'],
        3 => ['D', 'E', 'F'],
        4 => ['G', 'H', 'I'],
        5 => ['J', 'K', 'L'],
        6 => ['m', 'n', 'o'],
        7 => ['p', 'q', 'r', 's'],
        8 => ['t', 'u', 'v'],
        9 => ['w', 'x', 'y', 'z'],
    ];

    return $digitLetters[$digit];
}


$phoneNumber = "1905";

print_r(phoneNumberMnemonics($phoneNumber));