<?php
/**
 * 两个数组的交集 II
 * 给定两个数组，编写一个函数来计算它们的交集。
 * 示例 1：
 * 
 * 输入：nums1 = [1,2,2,1], nums2 = [2,2]
 * 输出：[2,2]
 * 示例 2:
 * 
 * 输入：nums1 = [4,9,5], nums2 = [9,4,9,8,4]
 * 输出：[4,9]
 *  
 * 
 * 说明：
 * 输出结果中每个元素出现的次数，应与元素在两个数组中出现次数的最小值一致。
 * 我们可以不考虑输出结果的顺序。
 * 进阶：
 * 
 * 如果给定的数组已经排好序呢？你将如何优化你的算法？
 * 如果 nums1 的大小比 nums2 小很多，哪种方法更优？
 * 如果 nums2 的元素存储在磁盘上，内存是有限的，并且你不能一次加载所有的元素到内存中，你该怎么办？
 * 
 * 不想排序，为啥排序效率会变高呢，是因为用了内置算法吗
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
    	if (empty($nums1) || empty($nums2)) return [];
        $arr=$arr1=[];
        //可以对比一下两个数组大小
        foreach ($nums1 as $value) {
        	if (array_key_exists($value, $arr)) {
        		$arr[$value]++;
        	}else{
        		$arr[$value]=1;
        	}
        }
        foreach ($nums2 as $v) {
        	if (array_key_exists($v, $arr)) {
        		$arr1[]=$v;
        		$arr[$v]--;
        		if (!$arr[$v]) unset($arr[$v]);
        	}
        }
        return $arr1;
    }
}

$a=new Solution();
$nums1=array(4,9,5);
$nums2=array(9,4,9,8,4);
$arr = $a->intersect($nums1, $nums2);
var_dump($arr);//true