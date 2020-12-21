<?php

include_once 'clsSort.php';
/**
 * 插入排序
 */
class insertSort extends clsSort
{
	public function insert_sort($arr)
	{
		for ($i=1; $i <= count($arr)-1; $i++) {
			if($arr[$i-1]>$arr[$i]) {
				$value = $arr[$i];
				// $index = $i;
				for ($j=$i-1; $j >-1 ; $j--) { 
					if ($arr[$j]>$value) {
						$arr[$j+1]=$arr[$j];
						$arr[$j]=$value;
						// $index = $i;
					}else{
						// echo $value;
						// $arr[$index]=$value;
						// $arr[$j+1]=$value;
						break;
					}
				}
				print_r($arr);
				echo "</br>";

			}
			
		}
	}
}

$arr=[43,56,3254,65,67,3,5,76,13,4,6,7];
print_r($arr);
echo "</br>";
echo "</br>";
$a = new insertSort();
print_r($a->insert_sort($arr));
