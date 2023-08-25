<?php
/**
 * One Edit
 *
 * You're given two strings stringOne and stringTwo. Write a function that determines if these can be made equal by
 * using only one edit.
 * There are three possible edits:
 * . Replace: One character is one string is swapped for a different character.
 * . Add: One character is added at any index in one string.
 * . Remove: One character is removed from any index in one string.
 *
 * Note that both strings will contain at least one character. If the strings are same, you should return true.
 */

function oneEdit($stringOne, $stringTwo)
{
    $lengthOne = strlen($stringOne);
    $lengthTwo = strlen($stringTwo);

    if ($lengthOne == $lengthTwo) {
        return oneEditReplace($stringOne, $stringTwo);
    } elseif ($lengthOne + 1 == $lengthTwo) {
        return oneEditInsert($stringOne, $stringTwo);
    } elseif ($lengthOne - 1 == $lengthTwo) {
        return oneEditInsert($stringTwo, $stringOne);
    }

    return false;
}

function oneEditInsert($stringOne, $stringTwo)
{
    $indexOne = 0;
    $indexTwo = 0;

    while ($indexOne < strlen($stringOne) && $indexTwo < strlen($stringTwo)) {
        if ($stringOne[$indexOne] != $stringTwo[$indexTwo]) {
            if ($indexOne != $indexTwo) {
                return false;
            }

        } else {
            $indexOne++;
        }
        $indexTwo++;
    }

    return true;
}

function oneEditReplace($stringOne, $stringTwo)
{
$foundDifference = false;

    for ($i = 0; $i < strlen($stringOne); $i++) {
        if ($stringOne[$i] != $stringTwo[$i]) {
            if ($foundDifference) {
                return false;
            }

            $foundDifference = true;
        }
    }

    return true;
}

$stringOne = 'hello';
$stringTwo = 'hollo';

print_r(oneEdit($stringOne, $stringTwo)); // true