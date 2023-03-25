<?php
/**
 * Tournament Winner
 * Author: https://github.com/iHasanMasud
 */

function tournamentWinner($competitions, $results)
{
    $currentBestTeam = '';
    $score = [];

    for ($i = 0; $i < count($competitions); $i++) {
        $homeTeam = $competitions[$i][0];
        $awayTeam = $competitions[$i][1];
        $winningTeam = $results[$i] === 1 ? $homeTeam : $awayTeam;

        if (!array_key_exists($winningTeam, $score)) {
            $score[$winningTeam] = 0;
        } else {
            $score[$winningTeam] += 3;
        }

        if ($score[$winningTeam] > ($score[$currentBestTeam] ?? 0)) {
            $currentBestTeam = $winningTeam;
        }
    }

    return $currentBestTeam;

}

$competitions = [
    ['Angular', 'React'],
    ['React', 'Vue'],
    ['Vue', 'Angular']
];

$results = [0, 0, 1];

print_r(tournamentWinner($competitions, $results));