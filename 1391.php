<?php

/**
 * 给你一个 m x n 的网格 
 * grid。网格里的每个单元都代表一条街道。grid[i][j] 的街道可以是：
 * 1 表示连接左单元格和右单元格的街道。
 * 2 表示连接上单元格和下单元格的街道。
 * 3 表示连接左单元格和下单元格的街道。
 * 4 表示连接右单元格和下单元格的街道。
 * 5 表示连接左单元格和上单元格的街道。
 * 6 表示连接右单元格和上单元格的街道。
 * 你最开始从左上角的单元格 (0,0) 开始出发，网格中的「有效路径」是指从左上方的单元格 (0,0) 开始、一直到右下方的 (m-1,n-1) 结束的路径。该路径必须只沿着街道走。
 * 提示：
 * m == grid.length
 * n == grid[i].length
 * 1 <= m, n <= 300
 * 1 <= grid[i][j] <= 6

 * 注意：你 不能 变更街道。
 * 如果网格中存在有效的路径，则返回 true，否则返回 false 。
 *
 * 根据别人的题解写出的。
 * 官方题解的两种方法看不懂 也不懂并查集
 */
class Solution {

	protected $row=[-1,1,0,0];//0上1下2左3右
    protected $col=[0,0,-1,1];
	protected $pipe=[[0,0,0,0],//0
    			[-1,-1,2,3],//1
    			[0,1,-1,-1],//2
    			[2,-1,-1,1],//3
    			[3,-1,1,-1],//4
    			[-1,2,-1,0],//5
    			[-1,3,0,-1]//6
    		];
    protected $vis;
    /**
     * @param Integer[][] $grid
     * @return Boolean
     */
    function hasValidPath($grid) {
    	$star = $grid[0][0];//第一个是第几种街道
    	$m=count($grid);
    	$n=count($grid[0]);
    	$this->vis=array_fill(0, $m, array_fill(0, $n, 0));
    	for ($i=0; $i <= 3; $i++) { 
			if ($this->pipe[$star][$i]!=-1) {//某个方向可行
    			if ($this->dfs(0,0,$this->pipe[$star][$i],$grid,$m,$n)) {//某条路可行
    				return true;
    			}
    		}
    	}
    	return false;
    }

    function dfs($x,$y,$dir,$grid,$m,$n)
    {
    	$this->vis[$x][$y]=1;
    	print_r($this->vis);
    	if ($x==$m-1 && $y==$n-1) return 1;
    	$xx=$x+$this->row[$dir];
    	$yy=$y+$this->col[$dir];
		if ($xx<0||$yy<0||$xx>=$m||$yy>=$n){
			var_dump([$xx,$n,$yy,$m]);
			return 0;
		}
    	$n_dir=$this->pipe[$grid[$xx][$yy]][$dir];//某个方向
    	echo $n_dir;
    	if ($n_dir!=-1 && !$this->vis[$xx][$yy]) {
    		var_dump([$xx,$yy,$n_dir]);
    		return $this->dfs($xx,$yy,$n_dir,$grid,$m,$n);
    	}
    }
}


$s=new Solution();
var_dump($s->hasValidPath([[4,3,3],[6,5,2]]));
// return;
var_dump($s->hasValidPath([[1]]));//true
var_dump($s->hasValidPath([[1,1,1,1,1,1,3]]));//true
var_dump($s->hasValidPath([[1,1,2]]));//false
var_dump($s->hasValidPath([[2,4,3],[6,5,2]]));//true
var_dump($s->hasValidPath([[1,2,1],[1,2,1]]));//false
var_dump($s->hasValidPath([[2],[2],[2],[2],[2],[2],[6]]));//true

