<?php

include_once 'clsSort.php';
/**
 * 选择排序
 */
class selectSort extends clsSort
{
	public function select_sort($arr)
	{
		for ($i=0; $i < count($arr); $i++) {
			$k=$i;
			for ($j=$i+1; $j < count($arr); $j++) { 
				if ($arr[$j]<$arr[$k]) $k=$j;
			}
			if ($k!=$i) {
				$this->swap($arr[$k],$arr[$i]);
			}
		}
		return $arr;
	}
}


$arr=[43,56,3254,65,67,3,5,76,13,4,6,7];
print_r($arr);
echo "</br>";
$a = new selectSort();
print_r($a->select_sort($arr));
