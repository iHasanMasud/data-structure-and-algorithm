<?php

/**
 * Minimum Waiting Time
 * Explanation: Write a function that takes in a non-empty array of positive integers representing the amounts of time that specific queries take to execute.
 * Algorithm: Sort the array and calculate the total waiting time.
 * Runtime: O(nlog(n)) | Space: O(1)
 */

function minimumWaitingTime(array $queries)
{
    sort($queries);
    $totalWaitingTime = 0;
    for ($i = 0; $i < count($queries); $i++) {
        $duration = $queries[$i];
        $queriesLeft = count($queries) - ($i + 1);
        $totalWaitingTime += $duration * $queriesLeft;
    }
    return $totalWaitingTime;
}

$queries = [3, 2, 1, 2, 6];

print_r(minimumWaitingTime($queries));
