<?php


	//左侧菜单
	function getColumn($data){
		$arr = array();
		foreach ($data as $key => $vo) {
			if($vo['pid'] == 0){
				$auth=0;
				$vo['child']=getChild($data,$vo['id']);

				foreach($vo['child'] as $v){
					$auth = $v['auth']+$auth;
				}
				if($auth > 0 ){
					$vo['auth'] = 1;
				}
				else{
					$vo['auth'] = 0;
				}
				if(empty($vo['child'])){
					$url = $vo['m']."/".$vo['c']."/".$vo['a'];
					$a = checkAuth($url);
					$vo['auth'] = $a;
				}
				$arr['column'][]=$vo;	

			}
		}
		$arr['module'] = MODULE_NAME;
		return $arr;
	}
	//左侧菜单 
	function getChild($data,$pid){
		$child = array();
		foreach ($data as $key => $vo) {
			if ($vo['pid'] == $pid) {
				$url = $vo['m']."/".$vo['c']."/".$vo['a'];
				$vo['url']=U($url);
				$vo['auth']=checkAuth($url);
				//echo $url."<br>";
				$child[]=$vo;

			}
		}

		return $child;
	}

	//权限规则列表

	function getRules(){
		$arr = array();
		$rules = M("auth_rule")->order("pid,id")->select();
		$column = M("column")->where(array("pid"=>0))->field("id,name")->select();
		foreach ($column as $vo) {
			foreach($rules as $v){
				if($v['pid'] == $vo['id']){
					$vo['child'][]=$v;
				}
			}
			$arr[] = $vo;
		}
		return $arr;
	}

	//数组转字符，之间"逗号" 隔开

	function arrayToString($array){
		
		$count = count($array)-1;
		foreach ($array as $key => $vo) {
			 if($key == $count){
			 	$arr .= $vo;
			 }
			 else{
			 	$arr .= $vo.",";
			 }
			
			
		}
		return $arr;
	}

	//判断某一个值是否存在数组里 返回输出

	function inArray($val,$array,$back){
		if(in_array($val,$array)){
			return $back;
		}
	}

	//检查用户名格式
	function checkUserName(){
		return true;
	}

	function checkPwd(){
		return true;
	}

	//日期差(剩余天数)
	function getChaBetweenTwoDate($date1){
	 	$date2=date("Y-m-d");
	    $Date_List_a1=explode("-",$date1);
	    $Date_List_a2=explode("-",$date2);
	 
	    $d1=mktime(0,0,0,$Date_List_a1[1],$Date_List_a1[2],$Date_List_a1[0]);
	 
	    $d2=mktime(0,0,0,$Date_List_a2[1],$Date_List_a2[2],$Date_List_a2[0]);
	 
	    $Days=round(($d1-$d2)/3600/24);
	 
	    return $Days;
	}
	function checkAuth($url){
		 //import("ORG.Util.Auth");
	   	   $auth = new \Think\Authority();
	   	   //$s = GROUP_NAME . '/' . MODULE_NAME.'/'.ACTION_NAME;
	       if(!$auth->getAuth($url,session('uid'))){
	       	return 0;
	       }
	       else{
	       	return 1;
	       }
	}

	function show_db_errorxx(){
		exit('系统访问量大，请稍等添加数据');
	}


	
?>