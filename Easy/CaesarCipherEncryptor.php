<?php
/**
 * Caesar Cipher Encryptor
 * Explanation: https://www.youtube.com/watch?v=JGJXf7X0VQE
 */

$str = "xyz";
function caesarCipherEncryptor($str, $key)
{
    $key = $key % 26; // if key is greater than 26, we can just use the remainder
    $newLetters = [];
    $newCode = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $newCode = ord($str[$i]) + $key; // get the new code by adding the key to the current letter
        if ($newCode <= 122) { // if the new code is less than or equal to z
            $newLetters[] = chr($newCode);
        } else {
            $newLetters[] = chr(96 + ($newCode % 122)); // if the new code is greater than z, we can just use the remainder
        }
    }
    return implode($newLetters);
}

print_r(caesarCipherEncryptor($str, 2));
