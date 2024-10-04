<?php
/**
 * Stable Internships
 * Explanation: A stable internship is a matching where there is no pair of interns (a, b) such that both a and b prefer each other over their current partners.
 * Given preferences of n interns, find out the maximum number of stable internships that can be formed.
 * Reference: https://www.youtube.com/watch?v=RE5PmdGNgj0
 * Reference: https://www.youtube.com/watch?v=0m_YW1zVs-Q
 */

function stableInternships($interns, $teams) {
    // Write your code here.
    $available = array_fill(0, count($interns), true);
    $matchings = array_fill(0, count($teams), null);

    while (in_array(true, $available)) {
        foreach ($interns as $intern => &$preferences) {
            if (!$available[$intern]) continue;
            $team = array_shift($preferences);
            if ($matchings[$team] === null) {
                $available[$intern] = false;
                $matchings[$team] = $intern;
            } else if(array_search($intern, $teams[$team]) < array_search($matchings[$team], $teams[$team])) {
                $available[$matchings[$team]] = true;
                $available[$intern] = false;
                $matchings[$team] = $intern;
            }
        }
    }
    return array_map(function($i, $t) { return [$i, $t]; }, $matchings, array_keys($matchings));
}

$interns = [
    [0, 1, 2],
    [1, 0, 2],
    [1, 2, 0],
];

$teams = [
    [2, 1, 0],
    [1, 2, 0],
    [0, 2, 1],
];

print_r(stableInternships($interns, $teams));
