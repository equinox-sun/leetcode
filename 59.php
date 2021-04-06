<?php
/**
 * 59. 螺旋矩阵 II
 * 给你一个正整数 n ，生成一个包含 1 到 n2 所有元素，且元素按顺时针顺序螺旋排列的 n x n 正方形矩阵 matrix 。
 * 示例 1：
 * 输入：n = 3
 * 输出：[[1,2,3],[8,9,4],[7,6,5]]
 * 示例 2：
 * 
 * 输入：n = 1
 * 输出：[[1]]
 */
class Solution {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n) {
    	$res = array_fill(0, $n, array_fill(0, $n, 0));
    	$dir_arr = [[0,1],[1,0],[0,-1],[-1,0]];//顺时针螺旋顺序：右，下，左，上
    	$x=$y=$dir=0;
    	$i=1;
    	$res[$x][$y]=$i;
    	while ($i<$n*$n) {
    		$xi = $x+$dir_arr[$dir][0];
        	$yi = $y+$dir_arr[$dir][1];
        	if ($xi<0 || $xi>$n-1 || $yi<0 || $yi>$n-1 || $res[$xi][$yi]) {
        		$dir=($dir+1)%4;
        	}else{
        		$x = $xi;
        		$y = $yi;
        		$i++;
        		$res[$x][$y]=$i;
        	}

    	}
        return $res;
    }
}

$s=new Solution();
print_r($s->generateMatrix(1));