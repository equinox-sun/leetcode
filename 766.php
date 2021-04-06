<?php
/*
 * 给你一个 m x n 的矩阵 matrix 。如果这个矩阵是托普利茨矩阵，返回 true ；否则，返回 false 。
 * 如果矩阵上每一条由左上到右下的对角线上的元素都相同，那么这个矩阵是 托普利茨矩阵 。
 * 
 */
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Boolean
     */
    function isToeplitzMatrix($matrix) {
    	$m = count($matrix);//行数
    	if ($m<0) return false;
    	$n = count($matrix[0]);//列数
    	for ($i=0; $i < $m-1; $i++) {
    		$x=$i;$y=0;
    		while ($x+1<$m && $y+1<$n) {
    			if ($matrix[$x][$y]!=$matrix[$x+1][$y+1]) return false;
    			$x++;$y++;
    		}
    	}

    	for ($j=0; $j < $n-1; $j++) {
    		$x=0;$y=$j;
    		while ($x+1<$m && $y+1<$n) {
    			if ($matrix[$x][$y]!=$matrix[$x+1][$y+1]) return false;
    			$x++;$y++;
    		}
    	}
    	return true;
    }
}

$matrix = [[1,2,3,4],[5,1,2,3],[9,5,1,2]];

$s = new Solution();
echo $s->isToeplitzMatrix($matrix);