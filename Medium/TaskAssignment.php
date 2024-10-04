<?php

/**
 * Task Assignment
 * You're given an integer k  representing a number of workers and an array of positive integers representing
 * durations of tasks that must be completed by the workers. Specifically, each worker must complete two unique
 * tasks and can only work on one task at a time. The number of tasks will always be equal to 2k such that each
 * worker always has exactly two tasks to complete. All tasks are independent of one another and can be completed
 * in any order. Workers will complete their assigned tasks in parallel, and the time taken to complete all tasks
 * will be equal to the time taken to complete the longest pair of tasks (see the sample output for an explanation).
 * Write a function that returns the optimal assignment of tasks to each worker such that the tasks are completed
 * as fast as possible. Your function should return a list of pairs, where each pair stores the indices of the tasks
 * that should be completed by one worker. The pairs should be in the following format: [task1, task2], where the
 * order of task1 and task2 doesn't matter. Your function can return the pairs in any order. If multiple optimal
 * assignments exist, any correct answer will be accepted.
 * Note: you'll always be given at least one worker (i.e., k will always be greater than 0).
 *
 * Reference: https://www.youtube.com/watch?v=dI7efEs3EfU
 * Reference: https://www.youtube.com/watch?v=WLpvR7tN-5c
 */

function taskAssignment($k, $tasks) {
    // Create an array with tasks and their original indices
    $formattedTasks = array_map(function($value, $index) {
        return ['value' => $value, 'index' => $index];
    }, $tasks, array_keys($tasks));

    // Sort the formatted tasks based on their values
    usort($formattedTasks, function($a, $b) {
        return $a['value'] - $b['value'];
    });

    $res = [];
    $start = 0;
    $end = count($formattedTasks) - 1;
    while ($start <= $end) {
        $res[] = [$formattedTasks[$start]['index'], $formattedTasks[$end]['index']];
        $start++;
        $end--;
    }
    return $res;
}

$k = 3;
$tasks = [1, 3, 5, 3, 1, 4];

print_r(taskAssignment($k, $tasks)); // [[0, 2], [4, 5], [1, 3]]
