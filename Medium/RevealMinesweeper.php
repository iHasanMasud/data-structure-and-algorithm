<?php

/**
 * Reveal Minesweeper
 *
 * You are given a two-dimensional integer matrix of 1s and 0s, where a 1 represents a mine and 0 represents an empty cell.
 * Given a coordinate (row, column) of an empty cell, find the nearest cell that contains a mine and return the distance between them.
 * Two cells are said to be adjacent if they share a corner or edge.
 *
 * Reference: https://www.youtube.com/watch?v=1BJJvodXiUY
 */


function revealMinesweeper(&$board, $row, $column)
{
    if ($board[$row][$column] == 'M') {
        $board[$row][$column] = 'X';
        return $board;
    }

    $numOfMines = 0;
    $rowStart = max($row - 1,0 );
    $rowEnd = min($row + 1, count($board) - 1);
    $columnStart = max($column - 1, 0);
    $columnEnd = min($column + 1, count($board[0]) - 1);

    for ($i = $rowStart; $i <= $rowEnd; $i++) {
        for ($j = $columnStart; $j <= $columnEnd; $j++) {
            if ($board[$i][$j] == 'M') {
                $numOfMines++;
            }
        }
    }

    $board[$row][$column] = $numOfMines;
    if ($numOfMines == 0) {
        for ($i = $rowStart; $i <= $rowEnd; $i++) {
            for ($j = $columnStart; $j <= $columnEnd; $j++) {
                if ($board[$i][$j] == 'H') {
                    revealMinesweeper($board, $i, $j);
                }
            }
        }
    }

    return $board;
}

$board = [
  ["M", "M"],
  ["H", "H"],
  ["H", "H"],
];

$row = 2;
$column = 0;

print_r(revealMinesweeper($board, $row, $column));