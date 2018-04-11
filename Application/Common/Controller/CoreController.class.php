<?php

namespace Common\Controller;
use Admin\Controller\ModuleController;
use Think\Controller;

class CoreController extends Controller {
	//全局信息
	public $UserInfo;

	/*
    * 后台控制器初始化
	*/
    protected function _initialize() {
    	/*读取配置信息*/
    	$config = S('DB_CONFIG_DATA');

    	if(! $config) {
    		D('Admin/Config')->cache();
    		$config = S('DB_CONFIG_DATA');
    	}
    	C($config);

    	$MA_LIST = S('MA_LIST');
    	if($MA_LIST == null) {
    		D('Admin/Module')->cache();
    		$MA_LIST = S('MA_LIST');
    	}

//    	if(!in_array(MODULE_NAME, $MA_LIST)) {
//    		$this->error('模块未安装，或未启动', __ROOT__);
//    	}

    	/*如果有用户登录，读取用户信息*/
    	if(session(C('AUTH_KEY')) >0) {
    		$this->UserInfo = session('UserInfo');
    		$this->assign('UserInfo', $this->UserInfo);
    	}
    }
}
