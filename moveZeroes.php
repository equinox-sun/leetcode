<?php
/**
 * 移动零
 * 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
 * 
 * 示例:
 * 
 * 输入: [0,1,0,3,12]
 * 输出: [1,3,12,0,0]
 * 说明:
 * 
 * 必须在原数组上操作，不能拷贝额外的数组。
 * 尽量减少操作次数。
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     * 执行用时：24 ms, 在所有 PHP 提交中击败了9.84%的用户
     * 内存消耗：16.4 MB, 在所有 PHP 提交中击败了41.90%的用户
     * 垃圾代码
     */
    function moveZeroes(&$nums) {
        if(empty($nums)) return [];
        $n=count($nums);
        $zero_arr=[];
        for($i=0;$i<$n;$i++){
            if($nums[$i]){
                if(!empty($zero_arr)){
                    $zero_arr[]=$i;
                    $nums[$zero_arr[0]] = $nums[$i];
                    $nums[$i] = 0;
                    array_shift($zero_arr);
                }
            }else{
                $zero_arr[]=$i;
            }
        }
        return $nums;
    }

    /**
     * 冒泡
     * 执行用时：100 ms, 在所有 PHP 提交中击败了5.08%的用户
     * 内存消耗：16.4 MB, 在所有 PHP 提交中击败了46.98%的用户
     * 垃圾代码
     */
    function moveZeroes1(&$nums)
    {
    	if(empty($nums)) return [];
        $n=count($nums);
        $k=0;
        for ($i=0; $i < $n; $i++) { 
        	if (!$nums[$i]) continue;
        	for ($j=$i; $j >$k; $j--) { 
        		if ($nums[$j-1]) break;
        	}
        	if ($j<$i) {
	        	$temp = $nums[$i];
	        	$nums[$i] = $nums[$j];
	        	$nums[$j] = $temp;
        	}
        	$k=$j;
        }
        return $nums;
    }

    /**
     * 双指针 + foreach最快了
     * 执行用时：8 ms, 在所有 PHP 提交中击败了99.37%的用户
     * 内存消耗：16 MB, 在所有 PHP 提交中击败了99.68%的用户
     * @param $nums
     */
    function moveZeros2(&$nums){
        if(empty($nums)) return [];
        $j=0;
        foreach ($nums as $key => $value) {
            if (!$value) continue;
            if ($value && $key==$j) {
                $j++;
                continue;
            }
            $nums[$j] = $value;
            $nums[$key] = 0;
            $j++;
        }
    }

    /**
     * 执行用时：8 ms, 在所有 PHP 提交中击败了99.37%的用户
     * 内存消耗：16.4 MB, 在所有 PHP 提交中击败了46.98%的用户
     */
    function moveZeros3(&$nums)
    {
        if(empty($nums)) return [];
        $n=count($nums);
        $i = 0;//统计前面0的个数
        for ($j = 0; $j < $n; $j++) {
            if ($nums[$j] == 0) {//如果当前数字是0就不操作
                $i++;
            } else if ($i != 0) {
                //否则，把当前数字放到最前面那个0的位置，然后再把
                //当前位置设为0
                $nums[$j - $i] = $nums[$j];
                $nums[$j] = 0;
            }
        }
    }
}


$a=new Solution();
$nums1=array(1,5,8,0,4,3,0);
$a->moveZeros3($nums1);
var_dump($nums1);
$nums2=array(0,4,3,0);
$a->moveZeros3($nums2);
var_dump($nums2);