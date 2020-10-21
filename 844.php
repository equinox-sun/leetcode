<?php
/**
 * 题目：给定 S 和 T 两个字符串，当它们分别被输入到空白的文本编辑器后，判断二者是否相等，并返回结果。 # 代表退格字符。
 * 注意：如果对空文本输入退格字符，文本继续为空。
 *
 * 这解法时间可以，空间不行
 * 正确解法：1.采用栈的方式，正序；2.采用双指针的方式，倒叙对比没有被删除的字母
 */

echo date('Y-m-d H:i:s',time());

$s=new Solution();

$res = $s->backspaceCompare("y#fo##f", "y#f#o##f");
var_dump($res);
echo "\n".date('Y-m-d H:i:s',time());


class Solution {

    /**
     * @param String $S
     * @param String $T
     * @return Boolean
     */
    function backspaceCompare($S, $T) {
    	while (preg_match('/\w#/', $S)) {
        	$S =preg_replace('/\w#/', '', $S);
    	}
    	while (preg_match('/\w#/', $T)) {
        	$T =preg_replace('/\w#/', '', $T);
    	}
    	$S=str_replace('#', '', $S);
    	$T=str_replace('#', '', $T);
        return $S===$T;
    }
}