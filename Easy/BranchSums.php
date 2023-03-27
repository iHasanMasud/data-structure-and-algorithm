<?php
/**
 * Branch Sums
 * Author: https://github.com/iHasanMasud
 */

// Use recursion to traverse the tree.

function branchSums($root)
{
    $sums = [];
    $stack = [["node" => $root, "sum" => 0]];

    while (count($stack) > 0) {
        $current = array_pop($stack);
        $node = $current["node"];
        $sum = $current["sum"];

        if ($node == null) {
            continue;
        }

        $newSum = $sum + $node["value"];

        if ($node["left"] == null && $node["right"] == null) {
            $sums[] = $newSum;
            continue;
        }

        $stack[] = [
            "node" => $node["left"],
            "sum" => $newSum
        ];

        $stack[] = [
            "node" => $node["right"],
            "sum" => $newSum
        ];
    }

    return $sums;
}

$tree = [
    "value" => 1,
    "left" => [
        "value" => 2,
        "left" => [
            "value" => 4,
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
        "value" => 3,
        "left" => [
            "value" => 6,
            "left" => null,
            "right" => null
        ],
        "right" => [
            "value" => 7,
            "left" => null,
            "right" => null
        ]
    ]
];

print_r(branchSums($tree));
