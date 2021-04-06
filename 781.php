<?php
class Solution {

    /**
     * @param Integer[] $answers
     * @return Integer
     */
    function numRabbits($answers) {
        $num=0;
        $arr=[];
        if (is_null($answers) || count($answers)==0) return 0;
        foreach ($answers as $answer) {
            if (array_key_exists($answer,$arr)){
                if ($arr[$answer]) $arr[$answer]--;
                else {
                    $num+=$answer+1;
                    $arr[$answer]=$answer;
                }
            }else{
                $arr[$answer]=$answer;
            }
        }
        $nums=array_keys($arr);
        $num=$num+array_sum($nums)+count($nums);
        return $num;
    }

}


$s=new Solution();
echo $s->numRabbits([1, 1, 2]);
echo $s->numRabbits([10, 10, 10]);