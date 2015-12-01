<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Secret Island 后台管理系统</title>
  <meta name="description" content="">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name="apple-mobile-web-app-title" content="Secret Island 后台管理系统" />
  <!--引入资源文件-->
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <link rel="stylesheet" href="/wxpt/Public/assets/css/amazeui.css"/>
  <link rel="stylesheet" href="/wxpt/Public/assets/css/admin.css">
  <!--[if lt IE 9]>
	<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
	<script src="/wxpt/Public/assets/js/polyfill/rem.min.js"></script>
	<script src="/wxpt/Public/assets/js/polyfill/respond.min.js"></script>
	<script src="/wxpt/Public/assets/js/amazeui.legacy.js"></script>
  <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/wxpt/Public/assets/js/jquery.min.js"></script>
<script src="/wxpt/Public/assets/js/amazeui.js"></script>
<!--<![endif]-->
<script src="/wxpt/Public/assets/js/app.js"></script>
<script src="/wxpt/Public/assets/js/amazeui.datetimepicker.min.js"></script>



  <script type="text/javascript" src="/wxpt/Public/plupload/js/plupload.full.min.js"></script>
</head>
<body>

<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong></strong> <small>采集后台管理系统</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
     <!-- <li>
        <a href="javascript:;"><span class="am-icon-bell-o"></span> 预约提醒 <span class="am-badge am-badge-warning num"></span></a>
        </li>-->
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php echo (session('title')); ?> <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="<?php echo U("Admin/User/index");?>"><span class="am-icon-user"></span> 资料</a></li>
          <!--<li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>-->
          <li><a href="<?php echo U("Admin/Login/out");?>"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>
<script type="text/javascript">
/*  $(function(){

    function load(){
     // alert()
      $.post("<?php echo U("Admin/RoomState/orderload");?>",function(data){

        $('.num').html(data);

      })
    }

    setInterval(load,1000*60);
    setTimeout(load,1000*1);
  })*/
</script>


<div class="am-cf admin-main">

	<!--引入左侧菜单文件-->
  
<!-- sidebar start -->

  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        
        <?php if(is_array($column)): foreach($column as $key=>$vo): if($vo['id'] == 32): ?><li class="" <?php if($vo['auth'] == 0): ?>style="display:none"<?php endif; ?>><a class="am-cf" href="<?php echo U('Admin/Index/index');?>"> <?php echo ($vo["name"]); ?> </a></li>
            <?php else: ?>
            <li class="admin-parent" style="<?php if($vo['auth'] == 0): ?>display:none<?php endif; ?>">
              <a class="am-cf" data-am-collapse="{target: '#<?php echo ($vo["id"]); ?>'}"> <?php echo ($vo["name"]); ?> <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        
              <ul class="am-list am-collapse admin-sidebar-sub " id="<?php echo ($vo["id"]); ?>">
                <?php if(is_array($vo['child'])): foreach($vo['child'] as $key=>$voChild): ?><li style="<?php if($voChild['auth'] == 0): ?>display:none<?php endif; ?>"><a href="<?php echo ($voChild["url"]); ?>" class="am-cf">
                  

                      <?php echo ($voChild["name"]); ?>
                      <?php if($voChild['c'] == $nowModule): ?><script type="text/javascript">
                        jQuery(function(){
                          $("#"+<?php echo ($vo["id"]); ?>).addClass("am-in")
                        });
                       </script><?php endif; ?></a>
                </li><?php endforeach; endif; ?>
              </ul>
            </li><?php endif; endforeach; endif; ?>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p></p>
        </div>
      </div>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-tag"></span> 信息</p>
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <!-- sidebar end -->

    <!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
     <div class="am-fl am-cf">
 	<i class="am-icon-home"></i>
 	<?php if(is_array($location)): foreach($location as $key=>$vo): ?><small><?php echo ($vo["name"]); ?></small>&nbsp;&nbsp;/&nbsp;&nbsp;<?php endforeach; endif; ?>
 	
 </div>
  </div>
    <div class="am-u-md-12">
      <form  class="am-form" id="form">
          <fieldset>
            <div class="am-tabs" data-am-tabs>
              <ul class="am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="#tab1">基础信息</a></li>

              </ul>
            
              <div class="am-tabs-bd">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                  <!-- <div class="am-form-group">
                    <label for="doc-select-1">所属分类</label>
                    <select id="doc-select-1" required name="cid" >
                      <option value="">-=请选择一项=-</option>
                      <?php if(is_array($catelist)): foreach($catelist as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $info[cid]): ?>selected<?php endif; ?>><?php echo ($vo["cname"]); ?></option><?php endforeach; endif; ?>
                    </select>
                  </div> -->
                  <div class="am-form-group">
                    <label for="doc-vld-name-2">标题:</label>
                    <input type="text" name="title" value="<?php echo ($info["title"]); ?>" id="doc-vld-name-2" minlength="3" placeholder="输入分类名（至少 3 个字符）" required/>
                  </div>
                  
                  <div class="am-form-group">
                    <label for="doc-vld-name-2">副标题:</label>
                    <input type="text" name="subtitle" value="<?php echo ($info["subtitle"]); ?>" id="doc-vld-name-2" minlength="3" placeholder="输入分类名（至少 3 个字符）" required/>
                  </div>
                  
                  <!-- <div class="am-form-group">
                    <label for="doc-vld-name-2">封面图:</label>
                    <div class="am-form-group am-form-file">
                        <a  class="am-btn am-btn-success am-btn-sm" id="pickfiles">
                          <i class="am-icon-cloud-upload"></i> 选择要上传的文件
                        </a>
                       
                        <a  class="am-btn am-btn-success am-btn-sm" id="uploadfiles">上传</a>
                        <img src="<?php if($info[thumb]): echo ($info["thumb"]); endif; ?>" alt="" class="img " height="100">
                        <input type="hidden" name="thumb" value="<?php if($info[thumb]): echo ($info["thumb"]); endif; ?>">
                    </div>
                    
                    <div id="file-list"></div>
                      <script>
                        $(function() {
                          $('#pickfiles').on('change', function() {
                            var fileNames = '';
                            $.each(this.files, function() {
                              fileNames += '<span class="am-badge">' + this.name + '</span> ';
                            });
                            $('#file-list').html(fileNames);
                          });
                        });
                      </script>
                    </div>
                  
                  <div class="am-form-group">
                    <label>显示/隐藏： </label>
                    <label class="am-radio-inline">
                      <input type="radio"  value="1" name="status" required     <?php if(empty($$info)): ?>checked<?php endif; ?>  <?php if($info[status] == 1): ?>checked<?php endif; ?>> 显示
                    </label>
                    <label class="am-radio-inline">
                      <input type="radio" value="0" name="status" <?php if(($info[status] == 0) and $info): ?>checked<?php endif; ?>> 隐藏
                    </label>
                  </div> -->
                </div>
      
              </div>
            </div>
           </fieldset>
           <input type="hidden" name="aid" value="<?php echo ($info["aid"]); ?>">
            <button  type="submit" id="act" class="am-btn am-btn-primary btn-loading-example" data-am-loading="{spinner: 'circle-o-notch', loadingText: '提交中...', resetText: '提交'}">提交</button>
      </form>     
  </div>
</div>
    

<!-- content end -->
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

</div>

<a class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<footer>
  <hr>
  <p class="am-padding-left">© <small>2015 QuGeo</small></p>
</footer>


<script type="text/javascript">


  $(function(){
    
   
      
    $('#form').validator({
      submit:  function(e) {
      var isFormValid = this.isFormValid();
      if(isFormValid == false){
        return false;
      }
      //异步处理表单添加
      var data = $("#form").serialize();
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
        url:"<?php echo U("Admin/Article/save_data");?>",
        
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