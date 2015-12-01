<?php
	namespace Admin\Controller;
	use Admin\Controller\CommonController;
class CategoryController extends CommonController{
	
	public function index(){
		$cateTree= F("CategoryTree");
		$this->cateTree = $cateTree;
		$this->display();
	}
	
	public function add(){
		$catelist = F("CategoryTree");
		$this->catelist = $catelist;
		$this->display();
	}
	
	public function edit(){
		$id = I("get.id");
		$Category = D("Category");
		$info = $Category->find($id);
		$catelist = F("CategoryTree");
		$this->catelist = $catelist;
		$this->info = $info;
		$this->display("add");
	}
	
	public function save(){
		if(IS_POST){
			$Category = D("Category");
			$sysinfo  = $Category -> save_data();
			if($sysinfo['create']){
				$this->error($sysinfo['create']);
			}
			
			if(!$sysinfo['save']){
				$this->error("操作出错");
			}
			$this->success("操作成功");
		}
	}
	
	public function del(){
		if(IS_POST){
			$Category = D("Category");
			$sysinfo = $Category->del_data();
			if($sysinfo['del_error']){
				$this->error("请先删除子分类");
			}
			if(!$sysinfo['status']){
				$this->error("操作出错");
			}
			$this->success("操作成功");
		}
	}
}
	
?>