<?php

/**
 * 冒泡排序
 */
include_once 'clsSort.php';

class bubbleSort extends clsSort
{
	public function bubble_sort($arr)
	{
		$flag=1;
		$k = $n = count($arr)-1;
		for ($i=0; $i < count($arr); $i++) { 
			$flag=1;//如果某一次遍历没有交换元素，就说明数组已有序
			for ($j=0; $j < $k; $j++) { 
				if ($arr[$j]>$arr[$j+1]) {
					// var_dump([$arr[$j],$arr[$j+1]]);
					$this->swap($arr[$j],$arr[$j+1]);
					// var_dump([$arr[$j],$arr[$j+1]]);
					$flag=0;
					$n=$j;//根据冒泡排序的原理，每一轮遍历都会把最大值放到最右边，需要排序的范围逐渐往左缩小。如果 $j 之后的元素没有动，则说明右边元素已是有序的。$n的最坏情况是每次减1。
				}
			}
			if ($flag) break;
			$k = $n;
			print_r($arr);
			echo "</br>";
			echo $k;
		}
		return $arr;
	}
}


$arr=[43,56,3254,65,67,3,5,76,13,4,6,7];
print_r($arr);
echo "</br>";
$a = new bubbleSort();
print_r($a->bubble_sort($arr));

echo "</br>";
$arr1=[1,2,3,4,5,6,7];
print_r($arr1);
echo "</br>";
print_r($a->bubble_sort($arr1));