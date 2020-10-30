<?php

/**
 * 144. 二叉树的前序遍历
 * 
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 * 
 * 四种主要的遍历思想为：
 * 前序遍历：根结点 ---> 左子树 ---> 右子树
 * 中序遍历：左子树---> 根结点 ---> 右子树
 * 后序遍历：左子树 ---> 右子树 ---> 根结点
 * 层次遍历：只需按层次遍历即可
 * 
 */
class Solution {

    /**
     * 前序 迭代
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $arr=[];
        $arr_stack=[];
        $node=$root;
        while($node!=null || !empty($arr_stack)){
        	if ($node!=null) {
        		$arr[]=$node->val;
        		// array_push($arr_stack, $node);
        		$arr_stack[]=$node;//如果用 array_push() 来给数组增加一个单元，还不如用 $array[] = ，因为这样没有调用函数的额外负担。
        		$node=$node->left;
        	}else{
        		$node=array_pop($arr_stack);
        		$node=$node->right;
        	}
        }
        return $arr;
    }

    /**
     * 前序 递归
     */
    function preorderTraversal1($root) {
        $arr=[];
        if($root!=null){
            $arr[]=$root->val;
            $arr=array_merge($arr,$this->preorderTraversal1($root->left));
            $arr=array_merge($arr,$this->preorderTraversal1($root->right));
        }
        return $arr;
    }

    /**
     * 前序 深度优先
     */
    public function preorderTraversal2($root)
    {
        $arr=[];
        if ($root==null) {
            return $arr;
        }
        $arr_stack=[];
        $arr_stack[]=$root;
        while (!empty($arr_stack)) {
            $node=array_pop($arr_stack);
            $arr[]=$node->val;;
            if ($node->right!=null) {
                $arr_stack[]=$node->right;
            }
            if ($node->left!=null) {
                $arr_stack[]=$node->left;
            }
        }
        return $arr;
    }
    /**
     * 
     */
    public function inOrderTraverse($root)
    {
        $arr=[];
        $arr_stack=[];
        $node=$root;
        while($node!=null || !empty($arr_stack)){
        	if ($node!=null) {
        		// array_push($arr_stack, $node);
        		$arr_stack[]=$node;//如果用 array_push() 来给数组增加一个单元，还不如用 $array[] = ，因为这样没有调用函数的额外负担。
        		$node=$node->left;
        	}else{
        		$node=array_pop($arr_stack);
        		$arr[]=$node->val;
        		$node=$node->right;
        	}
        }
        return $arr;
    }

    /**
     * 中序 递归版本
     */
    public function inOrderTraverse1($root)
    {
        $arr=[];
        if($root!=null){
            $arr=array_merge($arr,$this->inOrderTraverse1($root->left));
            $arr[]=$root->val;
            $arr=array_merge($arr,$this->inOrderTraverse1($root->right));
        }
        return $arr;
    }

    /**
     * 后序 递归版本
     */
    public function postOrderTraverse1($root)
    {
        $arr=[];
        if($root!=null){
            $arr=array_merge($arr,$this->inOrderTraverse1($root->left));
            $arr=array_merge($arr,$this->inOrderTraverse1($root->right));
            $arr[]=$root->val;
        }
        return $arr;
    }

    /**
     * 层次遍历
     * 
     */
    public function levelTraverse($root)
    {
        $arr=[];
    	if ($root==null) {
            return;
        }
        $arr_queue=[];
        $arr_queue[]=$root;
        while (!empty($arr_queue)) {
            $node=array_shift($arr_queue);
            $arr[]=$node->val;
            if ($node->left!=null) {
                $arr_queue[]=$node->left;
            }
            if ($node->right!=null) {
                $arr_queue[]=$node->right;
            }
        }
        return $arr;
    }
}