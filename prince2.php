<?php

/**
 * 买卖股票的最佳时机 II
 * 给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。
 * 设计一个算法来计算你所能获取的最大利润。你可以尽可能地完成更多的交易（多次买卖一支股票）。
 * 注意：你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 */
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
    	$len = count($prices);
    	if ($len<=1) return 0;
    	$bottom=$prices[0];$buy=0;$max=0;
    	for ($i=0; $i < $len-1; $i++) { 
    		if ($prices[$i]>$prices[$i+1]){
    			if ($buy && $prices[$i]>$bottom) {//拐点，卖出
    				$max+=$prices[$i]-$bottom;
    				$bottom=$prices[$i];
    				$buy=0;
    			}
    		}else{
				$bottom=$bottom<$prices[$i]?$bottom:$prices[$i];
				$buy=1;
    		}
    		print_r([$bottom,$buy,$max]);
    		echo "<br/>";
    	}
    	if ($buy && $prices[$i]>$bottom) {
    		$max+=$prices[$i]-$bottom;
    	}
        return $max;
    }
}

$s=new Solution();
echo($s->maxProfit([6,5,4,8]));
    		echo "<br/>";
echo($s->maxProfit([7,1,5,3,6,4]));
    		echo "<br/>";
echo($s->maxProfit([1,2,3,4,5]));
    		echo "<br/>";
echo($s->maxProfit([7,6,4,3,1]));

