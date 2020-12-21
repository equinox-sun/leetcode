<?php
/**
 * 941. 有效的山脉数组
 * 给定一个整数数组 A，如果它是有效的山脉数组就返回 true，否则返回 false。
 * 让我们回顾一下，如果 A 满足下述条件，那么它是一个山脉数组：
 * 
 * A.length >= 3
 * 在 0 < i < A.length - 1 条件下，存在 i 使得：
 * A[0] < A[1] < ... A[i-1] < A[i]
 * A[i] > A[i+1] > ... > A[A.length - 1]
 */
class Solution {

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    function validMountainArray($A) {
        if (count($A)<3)return false;
        $i=1;
        while ($A[$i]>$A[$i-1]) {
        	$i++;
        }
        while ($A[$i]<$A[$i-1]) {
        	$i++;
        }
        echo $i;
        return count($A)==$i+1?true:false;
    }
}

$a=new Solution();
// var_dump($a->validMountainArray(array(1,2,3,3,3)));//false
// var_dump($a->validMountainArray(array(1,2)));//false
// var_dump($a->validMountainArray(array(1,2,3,4,5)));//true
var_dump($a->validMountainArray(array(1,2,3,2,1)));//true
var_dump($a->validMountainArray(array(1,2,3,2,1,0)));//true
var_dump($a->validMountainArray(array(1,2,3,3,1,0)));//false
// var_dump($a->validMountainArray(array(1,2,3,2,2)));//false
// var_dump($a->validMountainArray(array(3,2,1,0)));//true
var_dump($a->validMountainArray(array(10,20,30,33,3,1)));//true
var_dump($a->validMountainArray(array(10,40,30,22,3,1)));//true
var_dump($a->validMountainArray(array(10,40,30,33,3,1)));//false