<?php
/**
 * 快速排序
 * 思想：
 * 1.递归：选一个数作为基数（这里我选的是第一个数），大于这个基数的放到右边，小于这个基数的放到左边，等于这个基数的数可以放到左边或右边，看自己习惯，这里我是放到了左边，一趟结束后，将基数放到中间分隔的位置，第二趟将数组从基数的位置分成两半，分割后的两个的数组继续重复以上步骤，选基数，将小数放在基数左边，将大数放到基数的右边，在分割数组，直到数组不能再分为止，排序结束。
 * 2.用一个数组记录边界
 * 3.位置选取：1.按序去第一个或最后一个（逆序的数列，选择首位为key，则会退化到O（n^2））；2.随机取基准；3.三数取中。一般用第三种
 * 4.挖坑法与交换法
 * 优化1、当待排序序列的长度分割到一定大小（比如10）后，使用插入排序。
 *
 */
class quickSort
{
	/**
	 * 交换法
	 */
	public function quick_sort($arr)
	{
		$sarr[0]=['left'=>0,'right'=>count($arr)-1];//保存需要排序的子数组边界
		$i=0;$n=1;
		while ($i<$n) {
			$left = $sarr[$i]['left'];
			$right = $sarr[$i]['right'];
			//随机获得关键值 k
			// $k = rand($left,$right-1);
			// echo $k;
			// //交换左边元素和k位元素
			// $arr = $this->swap($arr,$left,$k);
			// var_dump($arr);
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
			// var_dump($arr);
			}
			//保存边界数组
			if ($sarr[$i]['left']<$key-1) {
				$sarr[$n++] = ['left'=>$sarr[$i]['left'],'right'=>$key-1];
			}
			if ($sarr[$i]['right']>$key+1) {
				$sarr[$n++] = ['left'=>$key + 1,'right'=>$sarr[$i]['right']];
			}
			$i++;
			// echo '<br/>$sarr:';
			// var_dump($sarr);
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

	/**
	 * 交换法
	 */
	public function quick_sort1(&$arr,$left,$right)
	{
		if($left<$right) {
			// var_dump([$left,$right]);
			$temp_left=$left;
			$temp_right=$right;
			$target=$arr[floor(($temp_left+$temp_right)/2)];
			while ($temp_left<$temp_right) {
				while ($temp_left<$temp_right && $arr[$temp_left]<$target)++$temp_left;
				while ($temp_right>$temp_left && $arr[$temp_right]>$target)--$temp_right;
				var_dump([$temp_left,$temp_right]);
				if ($temp_left<$temp_right) {
					$arr=$this->swap($arr,$temp_left,$temp_right);
					--$temp_right;
					++$temp_left;
				var_dump($arr);
				}
			}
			// var_dump([$temp_left,$temp_right]);
			if ($temp_left==$temp_right)$temp_left++;
			if ($left<$temp_right) $this->quick_sort1($arr,$left,$temp_left-1);//这里做判断，就不用进入函数后在函数最初判断左右键大小
			if ($temp_left <$right) $this->quick_sort1($arr,$temp_right+1,$right);
		}
	}

	/**
	 * 填坑法
	 */
	public function quick_sort2(&$arr,$left,$right)
	{
		// print_r([$left,$right]);
		if ($left<$right) {
			$target=$arr[$left];
			$left_ops = $left;
			$right_ops = $right;
			while ($left_ops<$right_ops) {
				while ($left_ops<$right_ops && $arr[$right_ops]>$target) {
					$right_ops--;
				}
				if ($left_ops<$right_ops) {
					$arr[$left_ops++] = $arr[$right_ops];
				}
				while ($left_ops<$right_ops && $arr[$left_ops]<$target) {
					$left_ops++;
				}
				if ($left_ops<$right_ops) {
					$arr[$right_ops--] = $arr[$left_ops];
				}
			}
			$arr[$left_ops] = $target;
			$this->quick_sort2($arr,$left,$left_ops-1);
			$this->quick_sort2($arr,$left_ops+1,$right);//这里是 +1 ，取下一个元素
		}
	}
}

$arr=range(1, 50);
shuffle($arr);
$arr=array_splice($arr, 0, 7);
$arr=[9,33,29,10,31,37,50];
print_r($arr);
echo "<br/><br/><br/>";
$s=new quickSort();
print_r($s->quick_sort($arr));
echo "<br/><br/><br/>";
$s->quick_sort1($arr,0,count($arr)-1);
print_r($arr);
echo "<br/><br/><br/>";
$s->quick_sort2($arr,0,count($arr)-1);
print_r($arr);