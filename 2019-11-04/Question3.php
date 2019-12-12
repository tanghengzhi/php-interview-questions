<?php

$string = "abc";
$length = strlen($string);

/**
 * 使用二进制表示不同的排列组合
 * 
 * 0 0 1 a
 * 0 1 0 b
 * 0 1 1 ab
 * 1 0 0 c
 * 1 0 1 ac
 * 1 1 0 bc
 * 1 1 1 abc
 */
 for ($i = 1; $i < 1 << $length; $i++) {
     for ($j = 0; $j < $length; $j++) {
         if ($i & (1 << $j)) {
             echo $string[$j];
         }
     }
     echo "\n";
 }