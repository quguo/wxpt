<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class SystemController extends CommonController{
	public function __construct(){
       parent::__construct();
       
       //$this->shop = $this->getShop();
       $this->group = $this->getUserGroup();
     //  dump($this->getUserGroup());

   }

   //获取当前用户组可以添加的用户组
   private function getUserGroup(){
		$uid = session("uid");
		$authlist = M("auth_group")->select();

		return $authlist;
	}

   /*private function getGroup(){
   		$data = M("auth_group")->select();
   		return $data;
   }*/
   private function getShop(){
   		$uid = session("uid");
   		if($uid == 1){
   			$data = M("shop")->select();
   		}
		else{
			$info = M("admin")->where(array("id"=>$uid))->find();
			$data = M("shop")->where(array("sid"=>$info['sid']))->select();
		}
		return $data;
	}

	public function index(){
		$db = D("Admin");
		$uid = session("uid");
		$data = $db->relation(true)->select();
		$this->data = $data;
		$this->display();
	}

	public function addUser(){
		if(IS_POST){

			$user = D("Admin");
			
			if(!$user->create()){
				$this->error($user->getError());
			}

			$value = I();
			$data = array("pwd"=>md5($value['pwd']),"name"=>$value['name'],"gid"=>$value['gid']);
			$uid = M("admin")->add($data);  //插入用户名
			if(!$uid){
				$this->error("注册账号出错!");
			}
			$data = array("uid"=>$uid,"group_id"=>$value['gid']);
			$add = M("auth_group_access")->add($data);  			//插入用户所属用户组
			//$data = array("uid"=>$uid,"sid"=>$value['sid']);		//插入用户关联店铺
			//$add = M("admin_shop")->add($data);
			if(!$add){
				$this->error("注册账号出错");
			}
			$this->success("注册成功!");
		}else{
			
			$this->display();
		}
		
	}
	public function editUser(){
		if(IS_POST){
			$admin = D("Admin");
			if(!$admin->create()){
				$this->error($admin->getError());
			}
			$data = I();
			$insert = array("name"=>$data['name'],"status"=>$data['status'],"gid"=>$data['gid']);
			$save = $admin->where(array("id"=>$data['id']))->save($insert);
			$find = M("auth_group_access")->where(array("uid"=>$data['id']))->find();
			if(!$find){
				M("auth_group_access")->add(array("uid"=>$data['id'],"group_id"=>$data['gid']))->add();
			}
			else{
				M("auth_group_access")->where(array("uid"=>$data['id']))->save(array("group_id"=>$data['gid']));
			}
			
				//更新用户所属组
			if(!$save){
				$this->error("保存失败");
			}
			$this->success("保存成功");
		}else{
			$id = intval(I("id"));
			if($id != 1){
				$type=0;
			}else{
				$type=1;
			}
			$data = D("Admin")->where(array("id"=>$id))->relation(true)->find();

			$this->type = $type;
			$this->info = $data;
			$this->display();
		}
		
	}
	public function delUser(){
		if(IS_POST){
			$uid = session("uid");
			$id = I("id");

			if(is_numeric($id && $uid != $id)){
				if($id ==1){
					$this->error("不能删除超级管理账号");
				}
				M("admin")->where(array("id"=>$id))->save(array("status"=>-1));
				M("auth_group_access")->where(array("uid"=>$id))->delete();
				$this->success("删除成功");
			}
			$this->error("你不能删除自己");
		}
	}
}
?>