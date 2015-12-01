<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Code</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="alternate icon" type="image/png" href="{{assets}}i/favicon.png">
  <link rel="stylesheet" href="/wxpt/Public/assets/css/amazeui.min.css"/>
  <style>
    @media only screen and (min-width: 1200px) {
      .blog-g-fixed {
        max-width: 1200px;
      }
    }

    @media only screen and (min-width: 641px) {
      .blog-sidebar {
        font-size: 1.4rem;
      }
    }

    .blog-main {
      padding: 20px 0;
    }

    .blog-title {
      margin: 10px 0 20px 0;
    }

    .blog-meta {
      font-size: 14px;
      margin: 10px 0 20px 0;
      color: #222;
    }

    .blog-meta a {
      color: #27ae60;
    }

    .blog-pagination a {
      font-size: 1.4rem;
    }

    .blog-team li {
      padding: 4px;
    }

    .blog-team img {
      margin-bottom: 0;
    }

    .blog-content img,
    .blog-team img {
      max-width: 100%;
      height: auto;
    }

    .blog-footer {
      padding: 10px 0;
      text-align: center;
    }
  </style>
</head>
<body>
<header class="am-topbar">
  <h1 class="am-topbar-brand">
    <a href="#">HALO</a>
  </h1>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li class="am-active"><a href="#">首页</a></li>
      <li><a href="#">项目</a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          下拉 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li class="am-dropdown-header">标题</li>
          <li><a href="#">1. 去月球</a></li>
          <li class="am-active"><a href="#">2. 去火星</a></li>
          <li><a href="#">3. 还是回地球</a></li>
          <li class="am-disabled"><a href="#">4. 下地狱</a></li>
          <li class="am-divider"></li>
          <li><a href="#">5. 桥头一回首</a></li>
        </ul>
      </li>
    </ul>

    <form class="am-topbar-form am-topbar-left am-form-inline" role="search">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
      </div>
    </form>

    <div class="am-topbar-right">
      <div class="am-dropdown" data-am-dropdown="{boundary: '.am-topbar'}">
        <button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm am-dropdown-toggle" data-am-dropdown-toggle>其他 <span class="am-icon-caret-down"></span></button>
        <ul class="am-dropdown-content">
          <li><a href="#">注册</a></li>
          <li><a href="#">随便看看</a></li>
        </ul>
      </div>
    </div>

    <div class="am-topbar-right">
      <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm">登录</button>
    </div>
  </div>
</header>

<div class="am-g am-g-fixed blog-g-fixed">
<p id="server_result" class="am-u-md-5 am-u-sm-12" style="overflow: hidden;
    height: 150px;
">
<span class="am-badge am-text-sm am-badge-success am-round" style="padding: 0.6rem 1rem;margin-bottom:1rem">正在连接服务器...</span><br>

</p>  
</div>

<div class="am-g am-g-fixed blog-g-fixed">
  <div class="am-u-md-8" id="vlist">
    <ul data-am-widget="gallery" class="busbox am-gallery am-avg-sm-1
  am-avg-md-3 am-avg-lg-1 am-gallery-default" data-am-gallery="{ pureview: true }">
  <?php if(is_array($article)): foreach($article as $key=>$vo): ?><li>
        <div class="am-gallery-item data-info">
          <a href="<?php echo U("Home/Article/$vo[aid]");?>"><img class='lazy am-img-responsive' data-original='<?php echo ($vo[thumb]); ?>'  alt='<?php echo ($vo[title]); ?>' /><h1 ><?php echo ($vo[title]); ?></h1><div class='am-gallery-desc'><?php echo (date("Y-m-d",$vo["createtime"])); ?></div></a>
        </div>
      </li><?php endforeach; endif; ?>
      

    </ul>
    <div id="get_more">
     <a href="javascript:;" class="am-btn am-btn-block am-btn-success am-btn-xs"><i class="am-icon-cloud"></i> 加载更多</a>
    </div>
    <div id="loading" class="am-text-center" style="display:none">
     <i class="am-icon-spinner am-icon-spin"></i>
    </div>

    
  </div>

  <div class="am-u-md-4 blog-sidebar">
    <div class="am-panel-group">
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">关于我</div>
        <div class="am-panel-bd">
          <p>前所未有的中文云端字型服务，让您在 web 平台上自由使用高品质中文字体，跨平台、可搜寻，而且超美。云端字型是我们的事业，推广字型学知识是我们的志业。从字体出发，关心设计与我们的生活，justfont blog
            正是為此而生。</p>
          <a class="am-btn am-btn-success am-btn-sm" href="#">查看更多 →</a>
        </div>
      </section>
     
      <section class="am-panel am-panel-default">
  <div class="am-panel-hd">文章目录</div>
  <ul class="am-list blog-list">
    <?php if(is_array($top_article)): foreach($top_article as $key=>$vo): ?><li><a href="<?php echo U("Article/content",array("aid"=>$vo[aid]));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
  </ul>
</section>

      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">团队成员</div>
        <div class="am-panel-bd">
          <ul class="am-avg-sm-4 blog-team">
            <li><img class="am-thumbnail"
                     src="http://img4.duitang.com/uploads/blog/201406/15/20140615230220_F5LiM.thumb.224_0.jpeg" alt=""/>
            </li>
            <li><img class="am-thumbnail"
                     src="http://img4.duitang.com/uploads/blog/201406/15/20140615230220_F5LiM.thumb.224_0.jpeg" alt=""/>
            </li>
            <li><img class="am-thumbnail"
                     src="http://img4.duitang.com/uploads/blog/201406/15/20140615230220_F5LiM.thumb.224_0.jpeg" alt=""/>
            </li>
            <li><img class="am-thumbnail"
                     src="http://img4.duitang.com/uploads/blog/201406/15/20140615230220_F5LiM.thumb.224_0.jpeg" alt=""/>
            </li>
            <li><img class="am-thumbnail"
                     src="http://img4.duitang.com/uploads/blog/201406/15/20140615230159_kjTmC.thumb.224_0.jpeg" alt=""/>
            </li>
            <li><img class="am-thumbnail"
                     src="http://img4.duitang.com/uploads/blog/201406/15/20140615230220_F5LiM.thumb.224_0.jpeg" alt=""/>
            </li>
            <li><img class="am-thumbnail"
                     src="http://img4.duitang.com/uploads/blog/201406/15/20140615230220_F5LiM.thumb.224_0.jpeg" alt=""/>
            </li>
            <li><img class="am-thumbnail"
                     src="http://img4.duitang.com/uploads/blog/201406/15/20140615230159_kjTmC.thumb.224_0.jpeg" alt=""/>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </div>

</div>

<footer class="blog-footer">
  <p>    <small>© Copyright 2015. <a href="http://www.thinkphp.cn" target="_blank">ThinkPHP</a> 强力驱动 </small>
  </p>
</footer>



<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{assets}}js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/wxpt/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/wxpt/Public/assets/js/amazeui.min.js"></script>
<script src="/wxpt/Public/lazyload/amazeui.lazyload.min.js"></script>
<script src="/wxpt/Public/assets/js/jquery.more.js"></script>

<script type="text/javascript">
$(function() {
    // $('#vlist').more({
    //     "url": '/wxpt/index.php/Home/Index/index_ajax',
    //     "data":{"int":"{$int}"},
    //     "template": ".busbox",
    //     "trigger": "#get_more",
    //     'amount':1
    // });
    $("img.lazy").lazyload();

    ws = new WebSocket("ws://23.110.85.118:2346");
    ws.onopen = function() {
        var data= '<span class="am-badge am-text-sm am-badge-success am-round" style="padding: 0.6rem 1rem;margin-bottom:1rem">连接服务器成功</span><br>';
        $("#server_result").append(data);
        $("#server_result").smoothScroll({position: $(document).height() - $("#server_result").height()});
        ws.send('tom');
        //alert("给服务端发送一个字符串：tom");
    };
    ws.onmessage = function(e) {
        //alert("收到服务端的消息：" + e.data);
        var data= '<span class="am-badge am-text-sm am-badge-success am-round" style="padding: 0.6rem 1rem;margin-bottom:1rem">'+e.data+'</span><br>';
        $("#server_result").append(data);
        $("#server_result").smoothScroll({position: $(document).height() - $("#server_result").height()});
    };
     
});
</script>
</body>
</html>