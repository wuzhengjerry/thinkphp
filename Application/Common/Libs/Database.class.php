<?php
namespace Common\Libs;
use Think\Db;

//数据导出模型
class Database {
	/*
	*文件指针
	*/
	private $fp;

	/*
	*备份文件信息part-卷号，name-文件名
	*/
	private $file;

	/*
	*当前打开文件大小
	*/
	private $size = 0;

	/*
	*备份配置
	*/
	private $config

	/*
	*数据库备份构造方法
	*/
	public function __construct() {
		
	}
}