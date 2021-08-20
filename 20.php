<?php


class Solution
{
    function isValid($s){
        $arr =[
            '('=>')',
            '{'=>'}',
            '['=>']'
        ];
        $new_s='';
        for ($i=0;$i<strlen($s);$i++){
            if($new_s==''){
                $new_s.=$s[$i];
                continue;
            }
            $c = substr($new_s,-1);
            if(!isset($arr[$c])){
                $new_s.=$s[$i];
                continue;
            }
            if($s[$i]==$arr[$c]){
                $new_s=substr($new_s,0,-1);
            }else{
                $new_s.=$s[$i];
            }
        }
        return $new_s==''?true:false;
    }

    function isValid2($s){
        if(strlen($s)%2==1) return false;
        $stack_s=[];
        //$top=0;
        for ($i=0;$i<strlen($s);$i++){
            if(empty($stack_s)){
                if($this->pairs($s[$i])) $stack_s[]=$s[$i];
                else return false;
            }else{
                if($this->pairs($stack_s[count($stack_s)-1]) === $s[$i]){
                    array_shift($stack_s);
                }else{
                    $stack_s[]=$s[$i];
                }
            }
        }
        return empty($stack_s)?true:false;
    }

    function pairs($c){
        switch ($c){
            case '(':
                return ')';
            case  '{':
                return '}';
            case  '[':
                return ']';
            default:
                return 0;
        }
    }

    function isValid3($s){
        if(strlen($s)%2==1) return false;
        $stack_s=[];$top=0;
        $arr =[
            '('=>')',
            '{'=>'}',
            '['=>']'
        ];
        for ($i=0;$i<strlen($s);$i++){
            if (!isset($arr[$s[$i]])){
                if(empty($stack_s) || $arr[$stack_s[$top-1]] != $s[$i]) return false;
                array_pop($stack_s);
                $top--;
            }else{
                $stack_s[]=$s[$i];
                $top++;
            }
        }
        return empty($stack_s)?true:false;
    }
}



$string = "(){()[{}]}";
$string = "{()}[]{()}";
$s=new Solution();
var_dump($s->isValid3($string)) ;