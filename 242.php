<?php
/**
 * 242. 有效的字母异位词
 * 给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
 */
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
    	return sortWord($s)==sortWord($t);
    }

    function sortWord($value='')
    {
    	for ($i=0; $i < strlen($value); $i++) { 
    		# code...
    	}
    }
}