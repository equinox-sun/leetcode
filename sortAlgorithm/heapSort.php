<?php

/**
 * 堆排序
 * 因为是数组,下标从0开始,所以,下标为n根结点的左子结点为2n+1,右子结点为2n+2
 * 堆用来进行全排序，时间复杂度是 O(nlogn)

 * 而快排用来全排序，平均时间复杂度也是 O(nlogn)

 * 但堆排序可以用来求 TopK 时，堆的时间复杂度为 O(Klog2(n)，因为它只需要进行 K 轮排序即可
 */
include_once 'clsSort.php';

class heapSort extends clsSort
{
	public function heap_sort($arr)
	{
		$arr_size=count($arr);
		//将第一次排序抽出来，因为最后一次排序不需要再交换值了。
		$this->buildHeap($arr,$arr_size);
		// var_dump($arr);echo "</br>";echo "</br>";
		for ($i=$arr_size-1; $i >0 ; $i--) { 
			$this->swap($arr[$i],$arr[0]);//每一次建堆后，最n小值都位于根，将跟与第n位交换，可以一步步把最小值放在最后n一个结点
			$arr_size--;
			$this->buildHeap($arr,$arr_size);
			// var_dump($arr);echo "</br>";echo "</br>";
		}
		return $arr;
	}

	/**
	 * 用数组建立最小堆
	 */
	public function buildHeap(&$arr,$arr_size)
	{
		//计算出最开始的下标$index,比较每一个子树的父结点和子结点,将最小值存入父结点中
    	//从$index处对一个树进行循环比较,形成最小堆
    	for ($index=intval($arr_size/2)-1; $index >=0; $index--) { 
    		//如果有左节点,将其下标存进最小值$min
    		if ($index*2+1<$arr_size) {
    			$min=$index*2+1;
    			//如果有右子结点,比较左右结点的大小,如果右子结点更小,将其结点的下标记录进最小值$min
    			if ($index*2+2<$arr_size) {
    				if ($arr[$index*2+2]<$arr[$min]) {
    					$min=$index*2+2;
    				}
    			}
    			//将子结点中较小的和父结点比较,若子结点较小,与父结点交换位置,同时更新较小
    			if ($arr[$min]<$arr[$index]) {
    				// echo $min;
    				// print_r($arr);echo "</br>";
    				$this->swap($arr[$index],$arr[$min]);
    				// print_r($arr);echo "</br>";
    			}
    		}
    	}
	}
}


$arr=[43,56,3254,65,67,3,5,76,13,4,6,7];
print_r($arr);
echo "</br>";
$a = new heapSort();
print_r($a->heap_sort($arr));
