<?php
/**
 * 
 */
class quickSort
{
	public function quick_sort($arr)
	{
		$sarr[0]=['left'=>0,'right'=>count($arr)-1];//保存需要排序的子数组边界
		$i=0;$n=1;
		while ($i<$n) {
			$left = $sarr[$i]['left'];
			$right = $sarr[$i]['right'];
			//随机获得关键值 k
			$k = rand($left,$right-1);
			//交换左边元素和k位元素
			$arr = $this->swap($arr,$left,$k);
			var_dump($arr);
			$key = $left;
			$f = false;//标志位
			while ($left<=$right) {
				if (!$f) {
					if ($arr[$right]<$arr[$key]) {
						$arr = $this->swap($arr,$key,$right);
						$key=$right;
						$f=true;
					}
					$right--;
				}
				if ($f) {
					if ($arr[$left]>$arr[$key]) {
						$arr = $this->swap($arr,$key,$left);
						$key=$left;
						$f=false;
					}
					$left++;
				}
			}
			//保存边界数组
			if ($sarr[$i]['left']<$key-1) {
				$sarr[$n++] = ['left'=>$sarr[$i]['left'],'right'=>$key-1];
			}
			if ($sarr[$i]['right']>$key+1) {
				$sarr[$n++] = ['left'=>$key + 1,'right'=>$sarr[$i]['right']];
			}
			$i++;
			echo '<br/>$sarr:';
			var_dump($sarr);
		}
		return $arr;
	}


	public function swap($arr,$k1,$k2)
	{
		$t = $arr[$k1];
		$arr[$k1] = $arr[$k2];
		$arr[$k2] = $t;
		return $arr;
	}
}

$arr=range(1, 50);
shuffle($arr);
$arr=array_splice($arr, 0, 7);
print_r($arr);
echo "<br/><br/><br/>";
$s=new quickSort();
print_r($s->quick_sort($arr));