<?php

/**
 * Cycle in Graph
 * You're given a list of edges representing an unweighted, directed graph with at least one node. Write a function that returns a boolean representing whether the given graph contains a cycle.
 * For the purpose of this question, a cycle is defined as any number of vertices, including just one vertex, that are connected in a closed chain. A cycle can also be defined as a chain of at least one vertex in which the first vertex is the same as the last.
 *
 * Reference: https://www.youtube.com/watch?v=0dJmTuMrUZM
 */

function cycleInGraph($edges)
{
    for ($i = 0; $i < count($edges); $i++) {
        $hasCycle = getHasCycle($edges, $i);
        if ($hasCycle) {
            return $hasCycle;
        }
    }

    return false;
}

function getHasCycle($nodeList, $targetNode)
{
    $queue = [$targetNode];
    $visitedNodes = [];

    while (count($queue) > 0) {
        $currentNode = array_shift($queue);
        //Check if the target node includes in the node list's current node
        if (in_array($targetNode, $nodeList[$currentNode])) {
            return true;
        }

        $visitedNodes[$currentNode] = true;
        foreach ($nodeList[$currentNode] as $node) {
            if (!isset($visitedNodes[$node])) {
                $queue[] = $node;
            }
        }
    }

    return false;
}

$edges = [
    [1, 3],
    [2, 3, 4],
    [0],
    [],
    [2, 5],
    [],
];

print_r(cycleInGraph($edges)); //Output: true
