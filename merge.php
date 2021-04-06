<?php

/**
 * Class Solution
 * 1.增加一个空数组，归并排序
 * 2.插入排序
 * 3.置换
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     * 借用归并排序的思路
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $arr=[];
        $i=$j=0;
        while ($i<$m && $j<$n){
            if ($nums1[$i]<=$nums2[$j]){
                $arr[]=$nums1[$i++];
            }else{
                $arr[]=$nums2[$j++];
            }
        }
        while ($i<$m) $arr[]=$nums1[$i++];
        while ($j<$n) $arr[]=$nums2[$j++];
        $nums1=$arr;
    }

    /**
     * @param $nums1
     * @param $m
     * @param $nums2
     * @param $n
     * @return mixed
     * 因为是有序数组，用插入排序
     */
    function merge1(&$nums1, $m, $nums2, $n){
        if($m==0) return $nums1=$nums2;
        if ($n==0) return;
        //插入排序
        $i=$j=0;
        while ($i<$m+$n && $j<$n){
            if ($i<$m+$j && $nums2[$j]<$nums1[$i]) {
                for ($k=$m+$j;$k>$i;$k--){
                    $nums1[$k]=$nums1[$k-1];
                }
                $nums1[$i]=$nums2[$j++];
            }elseif ($i>=$m+$j && $j<$n){
                $nums1[$i]=$nums2[$j++];
            }
            $i++;
        }
    }

    function merge2(&$nums1, $m, $nums2, $n){
        //if($m==0) return $nums1=$nums2;
        //if ($n==0) return;
        $k=$m+$n-1;
        $i=$m-1;
        $j=$n-1;
        while ($i>=0&&$j>=0){
            $nums1[$k--]=$nums1[$i]>=$nums2[$j]?$nums1[$i--]:$nums2[$j--];
        }
        while ($j>=0)$nums1[$k--]=$nums2[$j--];
    }
}

$n = new Solution();
$nums1=[7,8,8,0,0,0];
$nums2=[4,5,6];
$n->merge2($nums1,3,$nums2,3);
var_dump($nums1);