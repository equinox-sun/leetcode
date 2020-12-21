<?php
/**
 * 389. 找不同
 * 给定两个字符串 s 和 t，它们只包含小写字母。
 * 字符串 t 由字符串 s 随机重排，然后在随机位置添加一个字母。
 * 请找出在 t 中被添加的字母。
 *
 * 输入：s = "abcd", t = "abcde"
 * 输出："e"
 * 解释：'e' 是那个被添加的字母。
 * 其他方法：
 *	1.字符串中的askii码值相加，两个字符串相减就得出添加的字母的askii码值
 *	2.两个字符串异或，最终得到的就是被添加的字母
 */
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function findTheDifference($s, $t) {
    	$arr_s=array();
        for ($i=0; $i <strlen($s) ; $i++) { 
        	if (array_key_exists($s[$i], $arr_s)) {
        		$arr_s[$s[$i]]++;
        	}else{
        		$arr_s[$s[$i]]=0;
        	}
        }
        $arr_t=array();
        for ($j=0; $j < strlen($t); $j++) {
        	if (!array_key_exists($t[$j], $arr_s)) {
        		return $t[$j];
        	}
        	if (array_key_exists($t[$j], $arr_t)) {
        		$arr_t[$t[$j]]++;
        	}else{
        		$arr_t[$t[$j]]=0;
        	}
        	if ($arr_t[$t[$j]] > $arr_s[$t[$j]]) {
        		return $t[$j];
        	}
        }
    }
}

$s="abcd";
$t="abcde";
$object = new Solution();
echo $object->findTheDifference($s,$t);