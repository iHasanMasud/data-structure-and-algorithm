<?php
/**
 * Run Length Encoding
 * Explanation: Transform a string into a new string where each character in the new string is followed by
 * a number representing how many times(max 9) that character appears in the original string. If the character does not have any duplicates,
 * the number after it is 1.
 * Example: "aaaabbcddd" => "4a2b1c3d"
 */

$string = "aaaaaaaaaaaaaaaabbcddd";
function runLengthEncoding($string)
{
    $encodedStringChars = [];
    $currentRunLength = 1;

    for ($i = 1; $i < strlen($string); $i++) {
        $currentChar = $string[$i];
        $previousChar = $string[$i - 1];

        if ($currentChar !== $previousChar || $currentRunLength === 9) {
            $encodedStringChars[] = $currentRunLength . $previousChar;
            $currentRunLength = 0;
        }

        $currentRunLength++;
    }

    $encodedStringChars[] = $currentRunLength . $string[strlen($string) - 1];

    return implode("", $encodedStringChars);
}

print_r(runLengthEncoding($string));
