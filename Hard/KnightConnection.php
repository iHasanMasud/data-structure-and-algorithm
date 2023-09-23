<?php
/**
 * Knight Connection
 *
 * You're given the position of two knight pieces on an infinite chess board. Write a function that returns the minimum
 * number of turns required before one of the knights is able to capture the other knight, assuming the knights are
 * working together to achieve this goal.
 *
 * The position of each knight is given as a list of 2 values, the x and y coordinates. A knight can make 1 of 8
 * possible moves on any given turn. Each of these moves involves moving in an "L" shape. This means they can either
 * move 2 squares horizontally and 1 square vertically, or they can move 1 square horizontally and 2 squares vertically.
 * For example, if a knight is currently at position [0, 0], then it can move to any of these 8 locations on its next move:
 * [[-2, 1], [-1, 2], [1, 2], [2, 1], [2, -1], [1, -2], [-1, -2], [-2, -1]]
 *
 * A knight is able to capture the other knight when it is able to move onto the square currently occupied by the other knight.
 * Each turn allows each knight to move up to one time. For example, if both knights moved towards each other once, and
 * then knightA captures knightB on its next move, two turns would have been used (even though knightB never made its
 * second move).
 *
 * Reference: https://www.youtube.com/watch?v=4SjxUqG2WZU
 */

function knightConnection($knightA, $knightB) {
    $queue = new SplQueue();
    $queue->enqueue([$knightA, 0]);
    $visited = [];
    $visited[$knightA[0]][$knightA[1]] = true;

    while (!$queue->isEmpty()) {
        $current = $queue->dequeue();
        $knight = $current[0];
        $turns = $current[1];

        if ($knight[0] === $knightB[0] && $knight[1] === $knightB[1]) {
            return $turns;
        }

        $moves = getMoves($knight);
        foreach ($moves as $move) {
            if (!isset($visited[$move[0]][$move[1]])) {
                $visited[$move[0]][$move[1]] = true;
                $queue->enqueue([$move, $turns + 1]);
            }
        }
    }

    return -1;
}

function getMoves($knight) {
    $moves = [];
    $x = $knight[0];
    $y = $knight[1];

    $moves[] = [$x - 2, $y + 1];
    $moves[] = [$x - 1, $y + 2];
    $moves[] = [$x + 1, $y + 2];
    $moves[] = [$x + 2, $y + 1];
    $moves[] = [$x + 2, $y - 1];
    $moves[] = [$x + 1, $y - 2];
    $moves[] = [$x - 1, $y - 2];
    $moves[] = [$x - 2, $y - 1];

    return $moves;
}

$knightA = [0, 0];
$knightB = [4, 2];

echo knightConnection($knightA, $knightB);