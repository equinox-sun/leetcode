<?php
/**
 * 283. 移动零
 * 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
 * 说明:
 *
 * 必须在原数组上操作，不能拷贝额外的数组。
 * 尽量减少操作次数。
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
    	foreach ($nums as $key => $value) {
    		if ($value==0) {
    			$nums[]=0;
    			unset($nums[$key]);
    		}
    	}
    }
}


$a=new Solution();
$arr=array(0,1,0,3,12);
$a->moveZeroes($arr);
var_dump($arr);//true