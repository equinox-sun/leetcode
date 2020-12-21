<?php

/**
 * 排序基类
 */
class clsSort
{
	
	public function swap(&$val1,&$val2)
	{
		$temp = $val1;
		$val1 = $val2;
		$val2 = $temp;
	}
}