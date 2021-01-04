<?php
/**
 * 330. 按要求补齐数组
 * 给定一个已排序的正整数数组 nums，和一个正整数 n 。从 [1, n] 区间内选取任意个数字补充到 nums 中，使得 [1, n] 区间内的任何数字都可以用 nums 中某几个数字的和来表示。请输出满足上述要求的最少需要补充的数字个数。
 * 思路：遍历1到n，如果nums数组中已存在则跳过，否则组合相加看能否得到（怎么组合我不会，两两组合、三三组合、四四组合、n组合），得不到（数组是排序的，所以如果要覆盖的数字已经大于数组某一个数字，则后面不用组合了）则计算需要添加什么数字，加入到数组中（插入），然后继续遍历
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer
     */
    function minPatches($nums, $n) {
    	$count=0;
    	if (!in_array($n, 1)) array_unshift($nums, 1);
        for ($i=0; $i < $n; $i++) { 
        	if (in_array($i, $nums)) continue;
        	for ($j=0; $j < count($nums); $j++) { 
        		# code...
        	}
        }
    }
}