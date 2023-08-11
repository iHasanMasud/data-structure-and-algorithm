<?php

/**
 * Colliding Asteroids
 *
 * Given an array of integers representing asteroids in a row, for each asteroid, the absolute value represents its size,
 * and the sign represents its direction (positive = right, negative = left). Return the state of the asteroids after all
 * collisions (assuming they are moving at the same speed). If two asteroids meet, the smaller one will explode. When they
 * are the same size, they both explode. Asteroids moving in the same direction will never meet.
 *
 * Reference: https://www.youtube.com/watch?v=LN7KjRszjk4
 */

function collideAsteroids(array $asteroids): array{
    $stack = [];
    foreach ($asteroids as $asteroid) {
        if ($asteroid > 0) {
            $stack[] = $asteroid;
        } else {
            while (!empty($stack) && end($stack) > 0 && end($stack) < abs($asteroid)) {
                array_pop($stack);
            }
            if (empty($stack) || end($stack) < 0) {
                $stack[] = $asteroid;
            } else if (end($stack) == abs($asteroid)) {
                array_pop($stack);
            }
        }
    }
    return $stack;
}

$asteroids = [-3, 5, -8, 6, 7, -4, -7];

print_r(collideAsteroids($asteroids));
