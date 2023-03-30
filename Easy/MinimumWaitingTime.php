<?php

/**
 * Minimum Waiting Time
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
