<?php
/**
 * Node Depths
 * Author: https://github.com/iHasanMasud
 */

function nodeDepths($root)
{
    return calculateNodeDepths($root, 0);
}

function calculateNodeDepths($node, $depth)
{
    if ($node === null) {
        return 0;
    }

    return $depth + calculateNodeDepths($node['left'], $depth + 1) + calculateNodeDepths($node['right'], $depth + 1);
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

print_r(nodeDepths($tree));