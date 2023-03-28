<?php
/**
 * Branch Sums
 * Author: https://github.com/iHasanMasud
 */

// Use recursion to traverse the tree.

function branchSums($root)
{
    $sums = [];
    calculateBranchSums($root, 0, $sums);
    return $sums;
}

function calculateBranchSums($node, $runningSum, &$sums)
{
    if ($node === null) {
        return;
    }

    $newRunningSum = $runningSum + $node['value'];
    if ($node['left'] === null && $node['right'] === null) {
        $sums[] = $newRunningSum;
        return;
    }

    calculateBranchSums($node['left'], $newRunningSum, $sums);
    calculateBranchSums($node['right'], $newRunningSum, $sums);
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
