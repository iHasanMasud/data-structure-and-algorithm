<?php

/**
 * Blackjack Probability
 *
 * In the game of Blackjack, the dealer must draw cards until the sum of the values of their cards is greater
 * than or equal to a target  value minus 4. For example, traditional Blackjack uses a target value of 21,
 * so the dealer must draw cards until their total is greater than or equal to 17, at which point they stop
 * drawing cards (they "stand"). If the dealer draws a card that brings their total above the target
 *  (above 21 in traditional Blackjack), they lose (they "bust").
 * Naturally, when a dealer is drawing cards, they can either end up standing or busting, and this is entirely up to the luck of their draw.
 * Write a function that takes in a target  value as well as a dealer's startingHand  value and returns the probability
 * that the dealer will bust (go over the target value before standing). The target  value will always be a positive
 * integer, and the startingHand  value will always be a positive integer that's smaller than or equal to the target value.
 *
 * Reference: https://www.youtube.com/watch?v=YDBeWh5hqP4
 */

function blackjackProbability($target, $startingHand)
{
    $memoize = [];
    return calculateProbability($startingHand, $target, $memoize);
}

function calculateProbability($currentHand, $target, $memoize)
{
    if (isset($memoize[$currentHand])) {
        return $memoize[$currentHand];
    }

    if ($currentHand > $target) {
        return 1;
    }

    if ($currentHand + 4 >= $target) {
        return 0;
    }

    $totalProbability = 0;

    for ($card = 1; $card <= 10; $card++) {
        $totalProbability += 0.1 * calculateProbability($currentHand + $card, $target, $memoize);
    }

    $memoize[$currentHand] = $totalProbability;

    return $totalProbability;
}

print_r(blackjackProbability(21, 15));