<?php

/**
 * Best Digits
 *
 * Write a function that takes a positive integer represented as a string number and an integer numDigits.
 * Remove numDigits digits from the string so that the number represented by the string is as large as possible afterward.
 */

function bestDigits($number, $numDigits){
    $number = str_split($number);
    $result = [];
    $count = 0;
    for($i = 0; $i < count($number); $i++){
        if($count < $numDigits){
            if($number[$i] < $number[$i+1]){
                $count++;
            }else{
                $result[] = $number[$i];
            }
        }else{
            $result[] = $number[$i];
        }
    }
    return implode($result);
}

echo bestDigits('1234567890', 3); // 4567890