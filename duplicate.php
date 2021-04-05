<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $arr=[];
        for($i=0;$i<count($nums);$i++){
            if(in_array($nums[$i],$arr)) return true;
            $arr[]=$nums[$i];
        }
        return false;
    }
}

$s=new Solution();
echo $s->containsDuplicate([1,2,3,4]);