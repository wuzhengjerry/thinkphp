<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/8
 * Time: 15:43
 */

namespace Common\Model;
use Think\Model;

class CacheModel extends Model {
    
    //自动验证
    protected $_validate = array(
        //array(验证字段，验证规则，错误提示，验证条件，附加规则，验证时间)
        array('name', 'require', '缓存路由不能为空！'， 1，'regex'， 3)，
        array('title', 'require', '缓存名称不能为空！', 1, 'regex', 3),
        array('key'， 'require', '模型key值不能为空！', 1, 'regex', 3),
    );

    //自动完成
    protected $_auto = array(
    	//array(填充字段， 填充内容，填充条件，附加规则)
    	array('system'， 0)，
    );

    /*
    *添加需要的缓存队列
    *
    */

    public function addCache(array $data) {
    	if(empty($data)) {
    		$this->error = '数据不能为空';
    		return false;
    	}

    	C('TOKEN_ON', false);
    	$data = $this->create($data, 1);
    	if($data) {
    		$id = $this->add($data);
    		if($id) {
    			return $id;
    		} else {
    			$this->error = '添加失败！';
    			return false;
    		}
    	} else {
    		return false;
    	}
    }

    /*删除指定模块下的全部缓存队列*/
    public function deleteCacheModule($module) {
        if(empty($module)) {
        	$this->error = '请指定模块';
        	return false;
        }

        if($this->where(array('module'=>$module, 'system'=>0))->delete() !== false) {
        	return true;
        } else {
        	$this->error = '删除失败！';
        }
    }

    /*获取需要的更新缓存队列*/
    public function getCacheList($isup = false) {
    	$cache = $this->order(array('id' => 'ASC'))->select();
    	S('cache_list', $cache, 600);
    	return $cache;
    } 

    /*执行更新缓存*/
    public function runUpdate(array($config)) {
    	if(empty($config)) {
    		$this->error = '没有可需要更新的缓存信息！';
    		return false;
    	}

    	$mo = '';
    	$mo = "{$config['module']}/{$config['module']}";
    	$model = D($mo);
    	if($config['action']) {
    		$action = $config['action'];
    		$model->$action();
    		return true;
    	}
    	return false;
    }

    /*安装模块时，注册缓存*/
    public function installMOduleCache(array $cache, array $config) {
    	if(empty($cache) || empty($config)) {
    		$this->error = '参数不完整！';
    		return false;
    	}
    	$module = $config['module'];
    	$data = array();
    	foreach ($cache as $key => $re) {
    		$add = array(
                'key' => $key,
                'name' => $rs['name'],
                'module' => $rs['module']? :$module,
                'model' => $rs['model'],
                'action' => $rs['action'],
                'param' => $rs['param'],
                'system' => 0, 
    		);
    		if(!$this->craete($add)) {
    			return false;
    		}
    		$data[] = $this->data('');
    	}
    	if(!empty($data)) {
    		return $this->addAll($data) !== false ? true:false;
    	}
    	return true;
    }
    
}