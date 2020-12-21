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
		$gap = round($n/2);//步长，用round取整
		while ($gap > 0) {
			for ($i=$gap; $i < $n; $i++) { 
				$temp=$arr[$i];
				$index = $i;
				while ($index >= $gap && $arr[$index-$gap]>$temp) {
					$arr[$index] = $arr[$index-$gap];
					$index = $index - $gap;
				}
				$arr[$index] = $temp;
			}
			$gap=round($gap/2);
		}
		return $arr;
	}
}


$arr=[43,56,3254,65,67,3,5,76,13,4,6,7];
print_r($arr);
echo "</br>";
$a = new ShellSort();
print_r($a->shell_sort($arr));