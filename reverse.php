<?php
/**
 * 给你一个 32 位的有符号整数 x ，返回将 x 中的数字部分反转后的结果。
 * 如果反转后整数超过 32 位的有符号整数的范围 [−2^31,  2^31 − 1] ，就返回 0。
 * 假设环境不允许存储 64 位整数（有符号或无符号）。
 * 
 */
class Solution {
	/*
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        if($x>=-9 && $x<=9) return $x;
    	$flag = $x<0?-1:1;
    	$x = abs($x);
        $res=$x%10;
        while($x>9){
            $x=floor($x/10);
            $res=$res*10+$x%10;
        }
        return $res*$flag;
    }
}


$a=new Solution();
$nums1=-100;
echo $a->reverse($nums1);
$nums1=3285;
echo $a->reverse($nums1);
$nums1=0;
echo $a->reverse($nums1);