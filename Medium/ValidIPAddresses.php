<?php

/**
 * Valid IP Addresses
 *
 * You're given a string of length 12 or smaller, containing only digits. Write a function that returns all the possible IP addresses that can be created by inserting three .s in the string.
 * An IP address is a sequence of four positive integers that are separated by .s, where each individual integer is within the range 0 - 255, inclusive.
 *
 * An IP address is a sequence of four positive integers that are separated by .s, where each individual integer is within the range 0 - 255, inclusive.
 *
 * An IP address isn't valid if any of the individual integers contains leading 0s. For example,
 * "192.168.0.1" is a valid IP address, but "192.168.00.1" and "192.168.0.01" aren't, because they contain "00" and 01, respectively.
 * Another example of a valid IP address is "99.1.1.10"; conversely, "991.1.1.0" isn't valid, because "991" is greater than 255.
 * Your function should return the IP addresses in string format and in no particular order. If no valid IP addresses can be created from the string, your function should return an empty list.
 *
 * Reference: https://www.youtube.com/watch?v=61tN4YEdiTM
 */

function validIPAddresses($string)
{
    $ipAddressesFound = [];
    $length = strlen($string);
    if ($length < 4 || $length > 12) {
        return $ipAddressesFound;
    }

    backTrack($string, 0, '', 0, $ipAddressesFound);

    return $ipAddressesFound;
}

function backTrack($s, $index, $current, $segmentCount, &$ipAddressesFound)
{
    if($index === strlen($s) && $segmentCount === 4) {
        $ipAddressesFound[] = substr($current, 1);
        return;
    }

    for ($i = 1; $i <= 3; $i++) {
        if ($index + $i > strlen($s)) {
            break;
        }
        $segment = substr($s, $index, $i);

        if ($segment[0] === '0' && strlen($segment) > 1) {
            continue;
        }

        if(intval($segment) <= 255) {
            backTrack($s, $index + $i, $current . '.' . $segment, $segmentCount + 1, $ipAddressesFound);
        }
    }
}

$string = '1921680';

print_r(validIPAddresses($string));