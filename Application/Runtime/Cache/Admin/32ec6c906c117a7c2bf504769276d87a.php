<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login Page | Amaze UI Example</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="/wxpt/Public/assets/css/amazeui.min.css"/>
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
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="msg-modal">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">系统提示
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd" id="system-msg">
      
    </div>
  </div>
</div>
<div class="header">
  <div class="am-g">
    <h1>Web ide</h1>
    <p>Integrated Development Environment<br/>代码编辑，代码生成，界面设计，调试，编译</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>登录</h3>
    <hr>
    <div class="am-btn-group">
      <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
      <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> Google+</a>
      <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> stackOverflow</a>
    </div>
    <br>
    <br>

    <form class="am-form" id="Form" onsubmit="return false;">
      <label for="username">邮箱:</label>
      <input type="text" name="login_name" id="login_name" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="login_pwd" id="login_pwd" value="">
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <button id="login" type="button" class="am-btn am-btn-primary btn-loading-example" data-am-loading="{spinner: 'circle-o-notch', loadingText: '检查中...', resetText: '登录'}">登录</button>
        <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
      </div>
    </form>
    <hr>
    <p>© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
  </div>
</div>
</body>
<script type="text/javascript" src="/wxpt/Public/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/wxpt/Public/assets/js/amazeui.min.js"></script>
<script type="text/javascript" src="/wxpt/Public/assets/js/admin.js"></script>

<script type="text/javascript">
  //后台登录JS
  $("#login").click(function(){
    var $btn = $(this)
      
    var login_username = $("#login_name").val();
    var login_pwd     =  $("#login_pwd").val();
    if(!login_username || !login_pwd){
      system_msg("请输入必要信息");
      return false;
    }
    $btn.button('loading');
    $.post("<?php echo U('Admin/Login/do_login');?>",{username:login_username,pwd:login_pwd},function(e){
      if(e.status == 0){
        $btn.html(e.info);
        setTimeout(function(){
              $btn.button('reset');
          }, 2000);
        return false;
      }
      $btn.html(e.info+"正在跳转...");
      setTimeout(function(){
            window.location.href="<?php echo U("Admin/Index/index");?>";
        }, 2000);
    })
  })
</script>
</html>