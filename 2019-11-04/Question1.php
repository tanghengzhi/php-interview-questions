<?php

$array = [
    [1, 2, 8, 9],
    [2, 4, 9, 12],
    [4, 7, 10, 13],
    [6, 8, 11, 15],
];

$number = 9;

/**
 * 最简单的方法就是遍历整个数组
 * 时间复杂度 O(Row*Column-1)
 */
function findNumberInArray($array, $number) {
    foreach ($array as $rowArray) {
        foreach ($rowArray as $value) {
            echo $value, " ";
            if ($number == $value) {
                return true;
            }
        }
    }

    return false;
}

/**
 * 从二维数组的左下角开始逐行查找
 * 时间复杂度 O(Row+Column-1)
 */
function findNumberInArray2($array, $number) {
    $minRow = 0;
    $minColumn = 0;
    $maxRow = count($array) - 1;
    $maxColumn = count($array[0]) - 1;

    if ($number < $array[0][0] || $number > $array[$maxRow][$maxColumn]) {
        return false;
    }

    for ($row = $maxRow; $row >= $minRow; $row--) {
        for ($column = $minColumn; $column <= $maxColumn; $column++) {
            echo $array[$row][$column], " ";
            if ($array[$row][$column] == $number) {
                return true;
            }
            if ($array[$row][$column] > $number) {
                break;
            }
            if ($array[$row][$column] < $number) {
                $minColumn = $column + 1;
            }
        }
    }

    return false;
}

/**
 * 从二维数组的右上角开始逐行查找
 * 时间复杂度 O(Row+Column-1)
 */
function findNumberInArray3($array, $number) {
    $minRow = 0;
    $minColumn = 0;
    $maxRow = count($array) - 1;
    $maxColumn = count($array[0]) - 1;

    if ($number < $array[0][0] || $number > $array[$maxRow][$maxColumn]) {
        return false;
    }
    
    for ($row = $minRow; $row <= $maxRow; $row++) {
        for ($column = $maxColumn; $column >= $minColumn; $column--) {
            echo $array[$row][$column], " ";
            if ($array[$row][$column] == $number) {
                return true;
            }
            if ($array[$row][$column] > $number) {
                $maxColumn = $column - 1;
            }
            if ($array[$row][$column] < $number) {
                break;
            }
        }
    }

    return false;
}

echo "/**
* 最简单的方法就是遍历整个数组
* 时间复杂度 O(Row*Column-1)
*/\n";
for ($number = 0; $number <= 15; $number++) {
    echo "find ", $number, ": ";
    findNumberInArray($array, $number);
    echo "\n";
}

echo "/**
* 从二维数组的左下角开始逐行查找
* 时间复杂度 O(Row+Column-1)
*/\n";
for ($number = 0; $number <= 15; $number++) {
    echo "find ", $number, ": ";
    findNumberInArray2($array, $number);
    echo "\n";
}

echo "/**
* 从二维数组的右上角开始逐行查找
* 时间复杂度 O(Row+Column-1)
*/\n";
for ($number = 0; $number <= 15; $number++) {
    echo "find ", $number, ": ";
    findNumberInArray3($array, $number);
    echo "\n";
}