<?php

/**
 * Optimal Freelancing
 * You recently started freelance software development and have been offered a variety of job opportunities.
 * Each job has a deadline, meaning there is no value in completing the work after the deadline. Additionally,
 * each job has an associated payment representing the profit for completing that job. Given this information,
 * write a function that returns the maximum profit that can be obtained in a 7-day period.
 *
 * Each job will take 1 full day to complete, and the deadline will be given as the number of days left to complete the job.
 * For example, if a job has a deadline of 1, then it can only be completed if it is the first job worked on.
 * If a job has a deadline of 2, then it could be started on the first or second day.
 *
 */

function optimalFreelancing($jobs)
{
    $lengthOfWeek = 7;
    $maxProfit = 0;
    $timeline = array_fill(0, $lengthOfWeek, false);

    usort($jobs, function ($a, $b) {
        return $b['profit'] - $a['profit'];
    });

    $profitableJobs = [];
    foreach ($jobs as $job) {
        $deadlineToConsider = min($job['deadline'], $lengthOfWeek);
        for ($i = $deadlineToConsider - 1; $i >= 0; $i--) {
            if (!$timeline[$i]) {
                $timeline[$i] = true;
                $maxProfit += $job['profit'];
                //$profitableJobs[] = $job;
                break;
            }
        }
    }

    return $maxProfit;

}

$jobs = [
    ['deadline' => 2, 'profit' => 100],
    ['deadline' => 1, 'profit' => 19],
    ['deadline' => 2, 'profit' => 27],
    ['deadline' => 1, 'profit' => 25],
    ['deadline' => 3, 'profit' => 15],
];

print_r(optimalFreelancing($jobs)); // 142