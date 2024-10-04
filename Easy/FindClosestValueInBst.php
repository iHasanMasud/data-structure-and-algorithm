<?php
/**
 * Find The Closest Value In BST
 * First, check if the target is equal to the current node's value.
 * If it is, then return the current node's value.
 * Otherwise, check if the target is less than the current node's value.
 * If it is, then go to the left node.
 * Otherwise, go to the right node.
 * Finally, return the closest value.
 */

function findClosestValueInBST($tree, $target) {
    $closest = $tree["value"];
    while ($tree) {
        if ($target == $tree["value"]) {
            return $tree["value"];
        }
        if (abs($target - $closest) > abs($target - $tree["value"])) {
            $closest = $tree["value"];
        }
        if ($target < $tree["value"]) {
            $tree = $tree["left"];
        } else {
            $tree = $tree["right"];
        }
    }

    return $closest;
}

$tree = [
    "value" => 10,
    "left" => [
        "value" => 5,
        "left" => [
            "value" => 2,
            "left" => null,
            "right" => null
        ],
        "right" => [
            "value" => 5,
            "left" => null,
            "right" => null
        ]
    ],
    "right" => [
        "value" => 15,
        "left" => null,
        "right" => [
            "value" => 22,
            "left" => null,
            "right" => null
        ]
    ]
];

print_r(findClosestValueInBST($tree, 12));