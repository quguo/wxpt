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

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <a href="/wxpt/index.php/Admin/Rbac/addRules" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增规则</a>
            <a href="/wxpt/index.php/Admin/Rbac/listGroup" class="am-btn am-btn-default"><span class="am-icon-save"></span> 查看用户组</a>
            
          </div>
        </div>
      </div>
      <!--<div class="am-u-sm-12 am-u-md-3">
        <div class="am-form-group">
          <select data-am-selected="{btnSize: 'sm'}">
            <?php if(is_array($column)): foreach($column as $key=>$vo): ?><option value="option1"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
          </select>
        </div>
      </div>
      <div class="am-u-sm-12 am-u-md-3">
        <div class="am-input-group am-input-group-sm">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
        </div>
      </div>-->
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">#</th><th class="table-title">规则名称</th><th class="table-type">规则标识</th><th class="table-set">标识类型</th><th class="table-type">操作</th>
              </tr>
          </thead>
          <tbody>

         
			<?php if(is_array($rules)): foreach($rules as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
	              <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" /></td>
	              <td><?php echo ($key); ?></td>
	              <td><?php echo ($vo["title"]); ?></td>
	              <td><?php echo ($vo["name"]); ?></td>
	              <td><?php if($vo['type'] == 0): ?>存在规则就通过<?php endif; ?></td>
	              <td >
	                <div class="am-btn-toolbar">
	                  <div class="am-btn-group am-btn-group-xs">
	                    <a href="/wxpt/index.php/Admin/Rbac/rulesEdit/id/<?php echo ($vo["id"]); ?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
	                    <a href="javascript:;" onclick="rulesDel(<?php echo ($vo["id"]); ?>)" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only my-confirm"><span class="am-icon-trash-o"></span> 删除</a>
	                  </div>
	                </div>
	              </td>
	            </tr><?php endforeach; endif; ?>
          </tbody>
        </table>
          <!--<div class="am-cf">
            共 15 条记录
            <div class="am-fr">
              <ul class="am-pagination">
                <li class="am-disabled"><a href="#">«</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
          <hr />
          <p>注：.....</p>-->
        </form>
      </div>

    </div>
  </div>
  <!-- content end -->

</div>

<a class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<footer>
  <hr>
  <p class="am-padding-left">© <small>2015 QuGeo</small></p>
</footer>

<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">系统提示</div>
    <div class="am-modal-bd">
      你，确定要删除这条记录吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>

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



</body>
<script type="text/javascript">
  //规则删除

  function rulesDel(val){

    $(".am-modal-bd").html("是否要删除?"+val)
      $('#my-confirm').modal({
            relatedTarget: this,
            onConfirm: function(options) {
              $.post("/wxpt/index.php/Admin/Rbac/rulesDel",{id:val},function(data){
                if(data.status == 0){
                  $(".am-modal-bd").html(data.info)
                  $("#callback").modal()
                }
                else{
                 
                  $(".am-modal-bd").html(data.info)
                  $("#callback").modal()
                   
                }
              })
            },
           
        });
  }

  $(function(){
     $("#callback").on('closed.modal.amui',function(){
        window.location='/wxpt/index.php/Admin/Rbac/index'
      })
  })
</script>
</html>