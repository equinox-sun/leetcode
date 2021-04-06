<?php
/**
 * 给你一个 m 行 n 列的矩阵 matrix ，请按照 顺时针螺旋顺序 ，返回矩阵中的所有元素。
 * 示例 1：
 * 输入：matrix = [[1,2,3],[4,5,6],[7,8,9]]
 * 输出：[1,2,3,6,9,8,7,4,5]
 */

class Solution {
    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $dir_arr = [[0,1],[1,0],[0,-1],[-1,0]];//顺时针螺旋顺序：右，下，左，上
    	$m=count($matrix)-1;//行数
    	$n=count($matrix[0])-1;//列数
    	$left=$top=0;//左边边界、顶部边界
    	$right=$n;//右边边界
    	$down=$m;//底边边界

    	$x=$y=$dir=0;
        $res[]=$matrix[$x][$y];
    	while ($left<=$right && $top<=$down) {
            if ($top<=$x+$dir_arr[$dir][0] && $x+$dir_arr[$dir][0]<=$down && $left<=$y+$dir_arr[$dir][1] && $y+$dir_arr[$dir][1]<=$right){
    			$x = $x+$dir_arr[$dir][0];
    			$y = $y+$dir_arr[$dir][1];
    			$res[]=$matrix[$x][$y];
                echo $matrix[$x][$y]."<br/>";
    		}else{
    			switch ($dir) {
    				case 0:
    					$top++;
    					break;
    				case 1:
    					$right--;
    					break;
    				case 2:
    					$down--;
    					break;
    				case 3:
    					$left++;
    					break;
    			}
    			$dir=($dir+1)%4;
    		}
    	}
        return $res;
    }
}

$s=new Solution();
print_r($s->spiralOrder([[1,2,3,4],[5,6,7,8],[9,10,11,12]]));