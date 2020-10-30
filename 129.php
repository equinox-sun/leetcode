<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    function sumNumbers($root) {
        $num=0;
        if ($root==null)return 0;
        $arr=$this->getNumbers($root);
        print_r($arr);
        $num=[];
        foreach ($arr as $k=> $val){
            $num[$k]=0;
            $num[$k]=$this->sumArr($val,$num);
        }
        return $num;
    }

    function getNumbers($node){
        if ($node!=null){
            $arr=[];
            if ($node->left==null && $node->right==null){
                // echo "yezi:";print_r([$node->val]);
                return [$node->val];
            }
            if ($node->left!=null){
                $l_arr=$this->getNumbers($node->left);
                // echo "l_arr:";print_r($l_arr);
                foreach ($l_arr as $k=> $v) {
                    $l_arr[$k]=array_merge([$node->val],[$v]);
                    // echo "l_arrk:";print_r($l_arr[$k]);
                }
                $arr=array_merge($arr,$l_arr);
            }
            if ($node->right!=null){
                $r_arr=$this->getNumbers($node->right);
                foreach ($r_arr as $k=> $v) {
                    $r_arr[$k]=array_merge([$node->val],[$v]);
                }
                // echo "r_arr:";print_r($r_arr);
                $arr=array_merge($arr,$r_arr);
            }
            // echo "<br/>:";print_r($arr);
            return $arr;
        }
    }

    function sumArr($arr,&$num){
        if (!is_array($arr[1])){
            return $num*100+$arr[0]*10+$arr[1];
        }else{
            $num=$num*10+$arr[0];
            return $this->sumArr($arr[1],$num);
        }
    }
}
