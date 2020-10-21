<?php

/**
 * 143. 重排链表
 * 给定一个单链表 L：L0→L1→…→Ln-1→Ln ，
 * 将其重新排列后变为： L0→Ln→L1→Ln-1→L2→Ln-2→…
 * 你不能只是单纯的改变节点内部的值，而是需要实际的进行节点交换。
 * 示例 1:
 * 给定链表 1->2->3->4, 重新排列为 1->4->2->3.
 * 示例 2:
 * 给定链表 1->2->3->4->5, 重新排列为 1->5->2->4->3.
 */
/**
 * 方法1：数组
 * 方法2：用快慢指针找中点，反转右半部分，合并
 */
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return NULL
     */
    function reorderList($head) {
    	if ($head===null ||$head->next===null||$head->next->next===null) return $head;
    	$fast=$slow=$head;
    	if ($fast !== null && $fast->next!==null && $fast->next->next!==null) {
    		$slow=$slow->next;
    		$fast=$fast->next->next;
    	}
    	$right=$this->reverse($slow);
    	$left=$head;
    	while ($left!==null) {
    		$l_next=$left->next;
    		$r_next=$right->next;
    		$left->next=$right;
    		$right->next=$l_next;
    		$left=$l_next;
    		$right=$r_next;
    	}
    	return $head;
    }

    function reverse($head)
    {
    	if ($head===null || $head->next===null) return $head;
    	$tail = $this->reverse($head->next);
    	$head->next->next=$head;
    	$head->next=null;
    	return $tail;
    }
}

$a=new Solution();
var_dump($a->reorderList([1,2,3,4,5]));