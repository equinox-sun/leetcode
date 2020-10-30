<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head) {
    	if ($head->next===null) return true;
    	$stack=[];
    	$i=0;
    	$stack[]=$head->val;
        while($head && $head->next){
        	if ($i<=0) $i=count($stack)-1;
        	$head=$head->next;
        	$stack[]=$head->val;
        	var_dump($stack);
        	if ($head->val==$stack[$i]) {echo "a";
        		$i--;
        	}elseif (isset($stack[count($stack)-3]) && $head->val==$stack[count($stack)-3]) {echo "b";
        		$i=count($stack)-4;
        		echo $i;
        	}else{echo "c";
        		if ($i!=count($stack)-1) $i=count($stack)-1;
        	}
        	echo $i;
        }
        echo $i;
        return $i==-1?true:false;
    }
}


include_once 'SingleLinkList.php';
$p = new SingleLinkList([1,2,2,2,2,1]);
$p->show();

$s =  new Solution();
$head = $p->head;
var_dump($s->isPalindrome($head));