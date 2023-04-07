<?php
/**
 * Spiral Traverse
 * Explanation: Given a 2D array, print it in a spiral order.
 * Reference: https://www.youtube.com/watch?v=siKFOI8PNKM
 */

function spiralTraverse($array)
{
    $result = [];
    $startRow = 0;
    $endRow = count($array) - 1;
    $startCol = 0;
    $endCol = count($array[0]) - 1;

    while ($startRow <= $endRow && $startCol <= $endCol) {
        for ($i = $startCol; $i <= $endCol; $i++) {
            $result[] = $array[$startRow][$i];
        }

        for ($i = $startRow + 1; $i <= $endRow; $i++) {
            $result[] = $array[$i][$endCol];
        }

        for ($i = $endCol - 1; $i >= $startCol; $i--) {
            if ($startRow === $endRow) {
                break;
            }
            $result[] = $array[$endRow][$i];
        }

        for ($i = $endRow - 1; $i > $startRow; $i--) {
            if ($startCol === $endCol) {
                break;
            }
            $result[] = $array[$i][$startCol];
        }

        $startRow++;
        $endRow--;
        $startCol++;
        $endCol--;
    }

    return $result;
}