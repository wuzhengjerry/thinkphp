<?php
namespace Home\Controller;

class IndexController extends UserCoreController {
    public function index(){
        $string = 'hello world!\1234456';
        echo strstr($string, '\\');
        $this->display();
    }
}