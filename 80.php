<?php
/**
 * 给你一个有序数组 nums ，请你 原地 删除重复出现的元素，使每个元素 最多出现两次 ，返回删除后数组的新长度。
 * 不要使用额外的数组空间，你必须在 原地 修改输入数组 并在使用 O(1) 额外空间的条件下完成。
 * 示例 1：
 * 输入：nums = [1,1,1,2,2,3]
 * 输出：5, nums = [1,1,2,2,3]
 * 解释：函数应返回新长度 length = 5, 并且原数组的前五个元素被修改为 1, 1, 2, 2, 3 。 不需要考虑数组中超出新长度后面的元素。
 * 示例 2：
 * 输入：nums = [0,0,1,1,1,1,2,3,3]
 * 输出：7, nums = [0,0,1,1,2,3,3]
 * 解释：函数应返回新长度 length = 7, 并且原数组的前五个元素被修改为 0, 0, 1, 1, 2, 3, 3 。 不需要考虑数组中超出新长度后面的元素。
 * 
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $n=count($nums);
        $i=2;
        while ($i<$n){
            if ($nums[$i]==$nums[$i-1] && $nums[$i]==$nums[$i-2]) {
                if ($i == $n-1) {
                    unset($nums[$i]);
                }else{
                    for ($j=$i; $j < $n-1; $j++) {
                        $nums[$j]=$nums[$j+1];
                    }

                }
                $n--;
            }else{
                $i++;
            }
        }
    	return $n;
    }

    function removeDuplicates1(&$nums)
    {
        $n=count($nums);
        if($n<=2)return $n;
        $i=$j=2;//快慢指针

        while ($i<$n) {
            if ($nums[$i]!=$nums[$i-2]) {
                $nums[$j]=$nums[$i];
                ++$j;
            }
            ++$i;
        }
        return $j;
    }
}

$s=new Solution();
$arr=[1,1,1,2,2,3];
echo $s->removeDuplicates1($arr);
var_dump($arr);