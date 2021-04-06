<?php

/**
 * 旋转数组
 * 给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。
 * 进阶：
 * 尽可能想出更多的解决方案，至少有三种不同的方法可以解决这个问题。
 * 你可以使用空间复杂度为 O(1) 的 原地 算法解决这个问题吗？
 * 
 * 示例 1:
 * 输入: nums = [1,2,3,4,5,6,7], k = 3
 * 输出: [5,6,7,1,2,3,4]
 * 解释:
 * 向右旋转 1 步: [7,1,2,3,4,5,6]
 * 向右旋转 2 步: [6,7,1,2,3,4,5]
 * 向右旋转 3 步: [5,6,7,1,2,3,4]
 * 示例 2:
 * 
 * 输入：nums = [-1,-100,3,99], k = 2
 * 输出：[3,99,-1,-100]
 * 解释: 
 * 向右旋转 1 步: [99,-1,-100,3]
 * 向右旋转 2 步: [3,99,-1,-100]
 * 
 * 提示：
 * 
 * 1 <= nums.length <= 2 * 10^4
 * -2^31 <= nums[i] <= 2^31 - 1
 * 0 <= k <= 10^5
 */
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function rotate(&$nums, $k) {
        $len = count($nums);
        if ($len<=1) return ;
        $i=$j=$n=0;
        $arr_k=array_fill(0, $k, 0);
        $k=$k<$len?$k:$k%$len;
        while ($i<$k) {
            $j=$i;
            $n=$nums[$j];
            while ($j<$len && !$arr_k[$j]) {
                $pos=($j+$k)%$len;
                if ($pos<$k) $arr_k[$pos]=1;
                $temp=$nums[$pos];
                $nums[$pos]=$n;
                $n=$temp;
                $j=$pos;
                print_r($nums);echo "<br/>";
            }
            $i++;

        }
    }
}

$s=new Solution();
$arr = [1,2,3,4,5,6,7];
$s->rotate($arr,3);
print_r($arr);echo "<br/>";
$arr1 = [-1,-100,3,99];
$s->rotate($arr12,2);
print_r($arr1);echo "<br/>";