<?php

namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
	
	public function _initialize(){
		//echo session("sid");
		if (!session("uid")) {
			//dump(session());
			//$this->error("你还没有登录",U("Admin/Login/index"));
			$this->redirect('Admin/Login/index', '', 0);
		}

		$columnData = $this->column();
		$this->column = $columnData['column'];
		$this->nowModule = $columnData['module'];
		//$this->location = $this->location();
		   
	}

	//左侧菜单
	private function column(){
		$db = M("column");
		$data = $db->where(array("status"=>1))->order("pid,level")->select();
		$data = getColumn($data);
		//dump($data);
		return $data;
	}
}
?>