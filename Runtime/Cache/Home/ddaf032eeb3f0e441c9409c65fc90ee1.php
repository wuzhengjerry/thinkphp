<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>
登录用户中心 - <?php echo C('WEB_SITE_TITLE');?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
<link rel="stylesheet" href="/Public/User/css/amazeui.min.css"/>
<style>
.header {
	text-align: center;
}
.header h1 {
	font-size: 200%;
	color: #333;
	margin-top: 30px;
}
.header p {
	font-size: 14px;
}
</style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1><?php echo C('WEB_SITE_TITLE');?></h1>
    <p><?php echo C('WEB_SITE_KEYWORD');?><br/>
      <?php echo C('WEB_SITE_DESCRIPTION');?></p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    
  <h2>登录</h2>
  <hr>
  <form method="post" class="am-form">
    <label for="username">用户名:</label>
    <input type="text" name="username" id="username" value="">
    <br>
    <label for="password">密码:</label>
    <input type="password" name="password" id="password" value="">
    <br>
    <label for="remember-me">
      <input id="remember-me" name="rember_password" type="checkbox">
      记住密码 </label>
    <br />
    <div class="am-cf">
      <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
      <a href="<?php echo U('User/Public/forget_password');?>" class="am-btn am-btn-danger am-btn-sm am-fr">忘记密码 ^_^? </a> <a href="<?php echo U('User/Public/reg');?>" class="am-btn am-btn-success am-btn-sm am-fr" style="margin:0px 5px">注册</a> </div>
  </form>

    <hr>
    <p>Powered by <a href="<?php echo C('SOFT_SITE');?>" style="color:#666"><?php echo C('SOFT_NAME');?> v <?php echo C('SOFT_VERSION');?></a> | Copyright © <a href="<?php echo C('SOFT_AUTHOR_SITE');?>" style="color:#666"><?php echo C('SOFT_AUTHOR');?></a> All rights reserved.</p>
  </div>
</div>
</body>
</html>