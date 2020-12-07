<?php
/**
 * 在计算机科学中，最长公共子串问题是寻找两个或多个已知字符串最长的子串。此问题与最长公共子序列问题的区别在于子序列不必是连续的，而子串却必须是。
 *
 * 方法1.动态规划
 * https://blog.csdn.net/ggdhs/article/details/90713154
 * i.公共子序列递推公式：
 *	当 i = 0 or j = 0,res[i][j]=0
 *	当 A[i] = B[j]时，res[i][j] = res[i-1][j-1]+1;
 *	当 A[i] != B[j]时，res[i][j] = max{res[i-1][j],res[i][j-1]}
 *
 * ii.公共子串递推公式
 *	当 i = 0 or j = 0,res[i][j]=0
 *	当 A[i] = B[j]时，res[i][j] = res[i-1][j-1]+1;
 *	当 A[i] != B[j]时，res[i][j] = 0
 *
 * 方法2.广义后缀树
 */
class LCS
{
	public function getLCS($string1,$string2)
	{
		$len1=strlen($string1);
		$len2=strlen($string2);
		$res=array_fill(0, $len2, array_fill(0, $len1, 0));
		for ($i=1; $i < $len2; $i++) { 
			for ($j=1; $j < $len1; $j++) { 
				if ($string1[$i-1] == $string2[$j-1]) {
					$res[$i][$j] = $res[$i-1][$j-1]+1;
				}else{
					$res[$i][$j] = $res[$i-1][$j] > $res[$i][$j-1] ? $res[$i-1][$j] : $res[$i][$j-1];
				}
			}
		}
		var_dump($res);
		return $res[$i-1][$j-1];
	}
}


$lcs = new LCS;
echo $lcs->getLCS('helloworld','loop');