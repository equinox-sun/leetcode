<?php
/**
 * 1365. 有多少小于当前数字的数字
 * 给你一个数组 nums，对于其中每个元素 nums[i]，请你统计数组中比它小的所有数字的数目。
 * 换而言之，对于每个 nums[i] 你必须计算出有效的 j 的数量，其中 j 满足 j != i 且 nums[j] < nums[i] 。
 * 以数组形式返回答案。
 * 最优解法如下
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallerNumbersThanCurrent($nums) {
    	$tmp_arr = $nums;
        rsort($tmp_arr);
        $tmp_arr = array_flip($tmp_arr);
        $length = count($nums);
        foreach ($tmp_arr as $key => $value) {
            $tmp_arr[$key] = $length - 1 -$tmp_arr[$key];
        }
        $arr = [];
        foreach ($nums as $value) {
            $arr[] = $tmp_arr[$value];
        }
        return $arr;
    }
}


$s=new Solution();
var_dump($s->smallerNumbersThanCurrent([6,5,4,8]));