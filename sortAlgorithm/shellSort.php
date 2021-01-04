<?php

/**
 * 希尔排序
 */
include_once 'clsSort.php';

class ShellSort extends clsSort
{
    public function shell_sort($arr)
    {
        $n = count($arr);
        $gap = round($n / 2);//步长，用round取整
        while ($gap > 0) {
            for ($i = $gap; $i < $n; $i++) {
                $temp = $arr[$i];
                $index = $i;
                while ($index >= $gap && $arr[$index - $gap] > $temp) {
                    echo $index - $gap;
                    $arr[$index] = $arr[$index - $gap];
                    $index = $index - $gap;
                }
                $arr[$index] = $temp;
                print_r($arr);
            }
            if ($gap == 1) {
                break;
            }
            $gap = round($gap / 2);
            echo $gap;
        }
        return $arr;
    }


    function shell_sort1(&$arr)
    {
        if (!is_array($arr)) return;
        $n = count($arr);
        for ($gap = floor($n / 2); $gap > 0; $gap = floor($gap /= 2)) {
            for ($i = $gap; $i < $n; ++$i) {
                for ($j = $i - $gap; $j >= 0 && $arr[$j + $gap] < $arr[$j]; $j -= $gap) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + $gap];
                    $arr[$j + $gap] = $temp;
                }
            }
        }
    }
}


$arr = [43, 56, 3254, 65, 67, 3, 5, 76, 13, 4, 6, 7];
print_r($arr);
echo "</br>";
$a = new ShellSort();
print_r($a->shell_sort($arr));