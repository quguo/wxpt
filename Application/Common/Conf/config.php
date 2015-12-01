<?php
return array(
	//'配置项'=>'配置值'
    
	'DB_TYPE'=>'mysql',
	'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'wxpt', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'think_', // 数据库表前缀 

    'SHOW_PAGE_TRACE'=>true,

    'APP_GROUP_LIST' => 'Admin', //项目分组设定
    'DEFAULT_MODULE'  => 'Admin', //默认分组

    'TMPL_L_DELIM'=>'<{', 					//修改左定界符
	'TMPL_R_DELIM'=>'}>', 					//修改右定界符	
    
    'TOKEN_ON'=>false,  // 是否开启令牌验证
    'TOKEN_NAME'=>'token',    // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
    
    'VAR_FILTERS'=>'stripslashes,htmlentities,htmlspecialchars',
    'URL_ROUTER_ON'   => true, 
    'URL_ROUTE_RULES'=>array(
        'Article/:aid\d'    => 'Article/content',
    ),
);