<?php

/**
 * Min Rewards
 *
 * Imagine that you're a teacher who's just graded the final exam in a class. You have a list of student scores on
 * the final exam in a particular order (not necessarily sorted), and you want to reward your students.
 * You decide to do so fairly by giving them arbitrary rewards following two rules:
 * 1) all students must receive at least one reward, and
 * 2) any given student must receive strictly more rewards than an adjacent student (a student immediately to
 * the left or to the right) with a lower score and must receive strictly fewer rewards than an adjacent
 * student with a higher score.
 *
 * Write a function that takes in a list of scores and returns the minimum number of rewards that you must give out
 * to students to satisfy the two rules.
 * You can assume that all students have different scores; in other words, the scores are all unique.
 */

function minRewards(array $scores): int {
    $rewards = array_fill(0, count($scores), 1);

    for ($i = 1; $i < count($scores); $i++) {
        if ($scores[$i] > $scores[$i - 1]) {
            $rewards[$i] = $rewards[$i - 1] + 1;
        }
    }

    for ($i = count($scores) - 2; $i >= 0; $i--) {
        if ($scores[$i] > $scores[$i + 1]) {
            $rewards[$i] = max($rewards[$i], $rewards[$i + 1] + 1);
        }
    }

    return array_sum($rewards);
}

$scores = [8, 4, 2, 1, 3, 6, 7, 9, 5];

print_r(minRewards($scores)); // 25