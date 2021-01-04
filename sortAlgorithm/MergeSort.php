<?php

/**
 * 归并排序
 */
include_once 'clsSort.php';

class MergeSort extends clsSort
{
	public function merge_sort($arr)
	{
		$this->makeSort($arr,0,count($arr)-1);
		return $arr;
	}

	private function makeSort(&$arr,$left,$right)
	{
		$center = floor(($left+$right)/2);
		if ($left<$center) {
			$this->makeSort($arr,$left,$center);
		}
		if ($center+1<$right) {
			$this->makeSort($arr,$center+1,$right);
		}
		
		$this->merge($arr,$left,$right);
	}

	private function merge(&$arr,$left,$right)
	{
		$left_end = floor(($left+$right)/2);
		$left_ops = $left;
		$right_ops = $left_end+1;
		$temp_arr=[];
		while ($left_ops<=$left_end && $right_ops<=$right) {
			if ($arr[$left_ops] < $arr[$right_ops]) {
				$temp_arr[]=$arr[$left_ops];
				$left_ops++;
			}else{
				$temp_arr[]=$arr[$right_ops];
				$right_ops++;
			}
		}
		while ($left_ops<=$left_end) {
			$temp_arr[]=$arr[$left_ops];
			$left_ops++;
		}
		while ($right_ops<=$right) {
			$temp_arr[]=$arr[$right_ops];
			$right_ops++;
		}
		for ($i=$left; $i <= $right; $i++) {
			$arr[$i] = $temp_arr[$i-$left];
		}
	}
}

$arr = [43, 56, 3254, 65, 67, 3, 5, 76, 13, 4, 6, 7];
// $arr = [6,5,3,1,8,7,2,4];
print_r($arr);
echo "</br>";
$a = new MergeSort();
print_r($a->merge_sort($arr));