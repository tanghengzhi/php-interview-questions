<?php

$array = [4, 5, 6, 7, 8, 10, 1, 2, 3];

/**
 * 使用 min() 函数
 * 时间复杂度：O（N）
 * 源码：https://github.com/php/php-src/blob/master/ext/standard/array.c
 */
echo min($array), "\n";

/**
 * 使用二分查找法
 * 时间复杂度：O(log2N)
 */
function findMinimumNumberInArray($array, $start = 0, $end = null) {
    if ($end == null) {
        $end = count($array) - 1;
    }

    if ($start == $end) {
        return $array[$start];
    }

    $middle = floor(($start + $end) / 2);

    if ($array[$start] < $array[$end]) {
        return findMinimumNumberInArray($array, $start, $middle);
    } else {
        return findMinimumNumberInArray($array, $middle, $end);
    }
}

echo findMinimumNumberInArray($array), "\n";