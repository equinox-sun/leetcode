<?php
/**
 * 旋转数组
给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。
 * 进阶：
 *尽可能想出更多的解决方案，至少有三种不同的方法可以解决这个问题。
 *你可以使用空间复杂度为 O(1) 的 原地 算法解决这个问题吗？
 *示例 1:
 *输入: nums = [1,2,3,4,5,6,7], k = 3
 *输出: [5,6,7,1,2,3,4]
 *解释:
 *向右旋转 1 步: [7,1,2,3,4,5,6]
 *向右旋转 2 步: [6,7,1,2,3,4,5]
 *向右旋转 3 步: [5,6,7,1,2,3,4]
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     * 把数组当成环形的，依次替换掉后k位的数
     */
    function rotate(&$nums, $k) {
        $len =count($nums);
        if ($len<=1) return ;
        if (!$k%$len)return ;
        $k = $k%$len;
        $i=$j=0;
        $arr_k = array_fill(0,$k,0);
        while ($i<$k){
            $j=$i;
            while ($j>=$k || !$arr_k[$j]){
                if ($j<$k)$arr_k[$j]=1;
                $pos=($j+$k)%$len;
                $temp=$nums[$pos];
                $nums[$pos]=$nums[$i];
                $nums[$i]=$temp;
                $j=$pos;
            }
            $i++;
        }
    }

    /**
     * @param $nums
     * @param $k
     * 旋转全部，再以第k位（即下标为k-1）作分界线两边旋转
     * 或者以第k位（即下标为k-1）作分界线两边旋转，再旋转整个数组
     */
    function rotate1(&$nums, $k) {
        $len =count($nums);
        if ($len<=1) return ;
        if (!$k%$len)return ;
        $k = $k%$len;
        $nums=array_reverse($nums);

    }
}

$s=new Solution();
$nums=[1,2,3,4,5,6,7];
$s->rotate($nums,3);
print_r($nums);echo "<br/>";
$nums2=[-1,-100,3,99];
$s->rotate($nums2,2);
print_r($nums2);echo "<br/>";