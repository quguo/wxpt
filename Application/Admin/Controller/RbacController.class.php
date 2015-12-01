<?php
//权限模块
namespace Admin\Controller;
use Admin\Controller\CommonController;
class RbacController extends CommonController{

	//权限列表
	public function index(){
		$rules = M("auth_rule")->select();
		$this->rules = $rules;
		$this->display();
	}

	//用户组
	
	public function listGroup(){
		$group = M("auth_group")->select();
		$this->group = $group;
		$this->display();
	}

	public function addGroup(){
		if(IS_POST){
			$data = I();
			$title = $data['title'];
			$list = $data['list'];
			$arr = arrayToString($list);
			
			$data = array("title"=>$title,"rules"=>$arr);
			$add = M("auth_group")->add($data);
			
			if(!$add){
				$this->error("操作出错");
			}
			$this->success("操作成功");
		}
		else{
			$arr = getRules($column,$rules);
			$this->arr = $arr;
			$this->display();
		}
	}

	public function groupEdit(){
		if(IS_POST){
			$id = I("id");
			$rules = I("list");
			$title = I("title");
			if(!id || !is_array($rules) || empty($rules) || !$title){
				$this->error("请填写相关数据");
			}
			$arr = arrayToString($rules);
			$data = array("title"=>$title,"rules"=>$arr);
			$save = M("auth_group")->where(array("id"=>$id))->save($data);
			if(!$save){
				$this->error("保存失败");
			}
			$this->success("操作成功");
		}
		else{

			$id = I("id");
			$info = M("auth_group")->where(array("id"=>$id))->find();
			
			$rules = explode(",",$info['rules']);
			$this->rules = $rules;
			$this->info = $info;
			
			$arr = getRules($column,$rules);
			//dump($column);
			$this->arr = $arr;
			$this->display();
		}
		
	}

	public function groupDel(){
		if (IS_POST) {
			$id = intval(I("id"));
			$del = M("auth_group")->where(array("id"=>$id))->delete();
			if(!$del){
				$this->error("删除出错");
			}
			$this->success("删除成功");
		}
	}
	//权限规则
	public function addRules(){
		if(IS_POST){
			//$data  = I("data");
			$name  = I("name");
			$title = I("title");
			$pid   = I("pid");
			if(!$name || !$title || !$pid){
				$this->error("请输入相关数据");
			}
			$data = array("title"=>$title,"name"=>$name,"pid"=>$pid);
			$add = M("auth_rule")->add($data);
			if (!$add) {
				$this->error("操作出错");
			}
			$this->success("操作成功");
		}
		else{
			
			$this->display();
		}
		
	}

	//权限规则编辑

	public function rulesEdit(){
		if (IS_POST) {
			$pid = intval(I("pid"));
			$name = I("name");
			$title = I("title");
			$id = I("id");
			if (!$id || !$name || !$title || !$name) {
				$this->error("请填写相关数据");
			}
			$data = array("name"=>$name,"title"=>$title,"pid"=>$pid);
			$save = M("auth_rule")->where(array("id"=>$id))->save($data);
			if(!$save){
				$this->error("操作出错");
			}
			$this->success("操作成功",U("Rbac/index"));
		}
		else{
			$id =intval(I("id")) ;
			if($id){
				$info = M("auth_rule")->where(array("id"=>$id))->find();
				$this->info = $info;
			}
			
			$this->display();
		}
		
	}

	public function rulesDel(){
		if(IS_POST){
			$id = intval(I("id"));
			if(!$id){
				$this->error("参数错误");
			}
			$del = M("auth_rule")->where(array("id"=>$id))->delete();
			if (!$del) {
				$this->error("删除出错".$id);
			}
			$this->success("删除成功 :)");
		}
		
	}
}
?>