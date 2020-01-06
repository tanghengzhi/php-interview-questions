<?php

$array = [2, 4, 1, 16, 7, 5, 11, 9];

$max = 0;

for($i = 0; $i < count($array) - 1; $i++) {
    for ($j = $i + 1; $j < count($array); $j++) {
        if ($array[$i] - $array[$j] > $max) {
            $max = $array[$i] - $array[$j];
        }
    }
}

echo $max, "\n";

// TODO: 分治法

// TODO: 动态规划