<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php echo ($info["title"]); ?> - halo</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="alternate icon" type="image/png" href="{{assets}}i/favicon.png">
  <link rel="stylesheet" href="/wxpt/Public/assets/css/amazeui.min.css"/>
  <style>
    @media only screen and (min-width: 641px) {
      .am-offcanvas {
        display: block;
        position: static;
        background: none;
      }

      .am-offcanvas-bar {
        position: static;
        width: auto;
        background: none;
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
      .am-offcanvas-bar:after {
        content: none;
      }

    }

    @media only screen and (max-width: 640px) {
      .am-offcanvas-bar .am-nav>li>a {
        color:#ccc;
        border-radius: 0;
        border-top: 1px solid rgba(0,0,0,.3);
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05)
      }

      .am-offcanvas-bar .am-nav>li>a:hover {
        background: #404040;
        color: #fff
      }

      .am-offcanvas-bar .am-nav>li.am-nav-header {
        color: #777;
        background: #404040;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05);
        text-shadow: 0 1px 0 rgba(0,0,0,.5);
        border-top: 1px solid rgba(0,0,0,.3);
        font-weight: 400;
        font-size: 75%
      }

      .am-offcanvas-bar .am-nav>li.am-active>a {
        background: #1a1a1a;
        color: #fff;
        box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
      }

      .am-offcanvas-bar .am-nav>li+li {
        margin-top: 0;
      }
    }

    .my-head {
      margin-top: 40px;
      text-align: center;
    }

    .my-button {
      position: fixed;
      top: 0;
      right: 0;
      border-radius: 0;
    }
    .my-sidebar {
      padding-right: 0;
      border-right: 1px solid #eeeeee;
    }

    .my-footer {
      border-top: 1px solid #eeeeee;
      padding: 10px 0;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
<div class="am-modal am-modal-alert" tabindex="-1" id="callback">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">系统提示</div>
    <div class="am-modal-bd callback-bd">
      
    </div>
    <input type="hidden" id="status" value="0">
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="loading">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">提交中...</div>
    <div class="am-modal-bd">
      <span class="am-icon-spinner am-icon-spin"></span>
    </div>
  </div>
</div>
<header class="am-g my-head">
  <div class="am-u-sm-12 am-article">
    <h1 class="am-article-title"><?php echo ($info["title"]); ?></h1>
    <p class="am-article-meta">halo</p>
  </div>
</header>
<hr class="am-article-divider"/>
<div class="am-g am-g-fixed">
  <div class="am-u-md-9 am-u-md-push-3">
    <div class="am-g">
      <div class="am-u-sm-11 am-u-sm-centered">
        <div class="am-cf am-article">
          <?php echo ($info["content"]); ?>
        </div>
        
        
        <hr/>
        
        <ul class="am-comments-list">
          <?php if(is_array($info["comments"])): foreach($info["comments"] as $key=>$vo): ?><li class="am-comment">
              <a href="#link-to-user-home">
                <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
              </a>
              <div class="am-comment-main">
                <header class="am-comment-hd">
                  <div class="am-comment-meta">
                    <a href="#link-to-user" class="am-comment-author"><?php echo ($vo["title"]); ?></a> 评论于 <?php echo (date("Y-m-d",$vo["createtime"])); ?>
                      
                  </div>
                </header>
                <div class="am-comment-bd">
                  <p><?php echo ($vo["content"]); ?></p>
                </div>
              </div>
            </li><?php endforeach; endif; ?>
          
        </ul>
        <div data-am-sticky="{animation: 'slide-top'}">
          <div class="am-g">
            <div class="am-u-md-12 am-u-sm-centered">
              <form class="am-form" id="common" onsubmit="return false">
                <fieldset class="am-form-set">
                  <input type="text" placeholder="头号" name="title" minlength="3" required>
                  <input type="text" placeholder="内容" name="content" minlength="3" required>
                  <input type="hidden" name="aid" value="<?php echo ($info["aid"]); ?>" >
                </fieldset>
                <button id="act" type="submit" class="am-btn am-btn-success am-btn-block">发表评论</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="am-u-md-3 am-u-md-pull-9 my-sidebar">
    <div class="am-offcanvas" id="sidebar">
      <div class="am-offcanvas-bar">
        <ul class="am-nav">
          <li><a href="#">永远的蝴蝶</a></li>
          <li class="am-nav-header">目录</li>
          <li><a href="#">原文</a></li>
          <li><a href="#">作者简介</a></li>
          <li><a href="#">文章赏析</a></li>
          <li><a href="#">读者评论</a></li>
        </ul>
      </div>
    </div>
  </div>
  <a href="#sidebar" class="am-btn am-btn-sm am-btn-success am-icon-bars am-show-sm-only my-button" data-am-offcanvas><span class="am-sr-only">侧栏导航</span></a>
</div>

<footer class="my-footer">
  <p>sidebar template<br><small>© Copyright XXX. by the AmazeUI Team.</small></p>
</footer>



<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/wxpt/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/wxpt/Public/assets/js/amazeui.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#common').validator({
      submit:  function(e) {
          var isFormValid = this.isFormValid();
          if(isFormValid == false){
            return false;
          }
          //异步处理表单添加
          var data = $("#common").serialize();
          var $btnObj = $("#act");
          var $loadObj = $("#loading");
          var $callbackObj = $("#callback");
          $.ajax({
            data:data,
            dataType:"json",
            type:"post",
            cache:false,
            beforeSend:function(){
              //btnObj.button("loading");
              $loadObj.modal();
            },
            url:"<?php echo U("Home/Article/save_common");?>",
            
            success:function(e){
              // btnObj.button('reset');
              $loadObj.modal("close");
              $(".callback-bd").html(e.info);
              $callbackObj.modal();
            }
          })
          return false;
        }
    });
  })
</script>
</body>
</html>