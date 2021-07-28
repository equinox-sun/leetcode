<?php
/**
 * 给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
 * 注意：若 s 和 t 中每个字符出现的次数都相同，则称 s 和 t 互为字母异位词。
 * 提示：只包含小写字母。
 */
class Solution {

	public function isAnagram($s, $t)
	{
	    if(strlen($s)!=strlen($t)) return false;
		$arr_s = str_split($s);
		$arr_t = str_split($t);

		$res=ord($arr_s[0]);echo $res."\n";
		for ($i=1; $i < count($arr_s)+count($arr_t); $i++) {
			$res ^=  ($i>=count($arr_s) ? ord($arr_t[$i-count($arr_s)]) : ord($arr_s[$i]));
			echo $res."\n";
		}

		return $res;
	}
}


$s = "anagram";
$t = "nagaram";
$a=new Solution();
var_dump($a->isAnagram($s, $t)) ;