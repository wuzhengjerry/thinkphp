<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $string = 'hello world!\1234456';
//        echo strstr($string, '\\');
//        $defindedvalue = get_defined_constants();
//        echobr($defindedvalue);exit;
//        echobr($GLOBALS);
        $this->display();
    }
}