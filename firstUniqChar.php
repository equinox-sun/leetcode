<?php
/**
 * 给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。
 * 示例：
 * s = "leetcode"
 * 返回 0
 * s = "loveleetcode"
 * 返回 2
 
 * 提示：你可以假定该字符串只包含小写字母。
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        $arr = str_split($s);
//        var_dump($arr);
        $arr2 = array_flip($arr);
        foreach ($arr as $k => $v){
            if($k==$arr2[$v]) return $k;
            $arr2[$v]=-1;
        }
        return -1;
    }

    public function firstUniqChar2($s)
    {
        $arr = str_split($s);
        $arr2=[];
        foreach ($arr as $k => $v) {
            if (array_key_exists($v, $arr2)) {
                $arr2[$v]++;
            }else{
                $arr2[$v]=1;
            }
        }
        foreach ($arr as $key => $value) {
            if ($arr2[$value]==1) {
                return $key;
            }
        }
        return -1;
    }
}


$a=new Solution();
echo $a->firstUniqChar2('leetcode');
echo $a->firstUniqChar2('loveleetcode');
echo $a->firstUniqChar2('leetcodeleetcode');