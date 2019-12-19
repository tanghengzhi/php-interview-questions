<?php

/**
 * Quick Sort Implement 1
 * @param array $array
 * @return array
 */
function quickSort(array $array) {
    if (count($array) <= 1) {
        return $array;
    }

    $middle = $array[0];
    $left = [];
    $right = [];

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $middle) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    return array_merge(quickSort($left), [$middle], quickSort($right));
}

/**
 * Quick Sort Implement 2
 * @param array $array
 * @param  int $start
 * @param  int $end
 */
function quickSort2(array &$array, int $start, int $end) {
    if ($start >= $end) {
        return;
    }

    $i = $start;
    $middle = $array[$start];

    for ($j = $start + 1; $j <= $end; $j++) {
        if ($array[$j] < $middle) {
            $i++;
            exchange($array[$i], $array[$j]);
        }
    }

    exchange($array[$i], $array[$start]);

    quickSort2($array, $start, $i - 1);
    quickSort2($array, $i + 1, $end);
}

function exchange(&$a, &$b) {
    [$a, $b] = [$b, $a];
}

function printArray($array) {
    foreach ($array as $value) {
        echo $value, " ";
    }
    echo "\n";
}

$array = [6, 5, 3, 1, 8, 7, 2, 4];
printArray(quickSort($array));
quickSort2($array, 0, count($array) - 1);
printArray($array);