<?php
	namespace Admin\Model;
	use Think\Model;
	class CategoryModel extends Model{
		
		protected $insertFields = array('title','pid','status');
    	protected $updateFields = array("id",'title','pid','status');
		
		public function save_data(){
			$arr = array();
			if(!$this->create()){
				 $arr['create'] = $this->getError();
				 return $arr;
			}
			
			if(I("post.id")){
				$arr['save'] = $this->save();
			}else{
				$arr['save'] = $this->add();
			}
			
			if($arr['save']){
				//更新缓存
				$this->getCategoryList();
			}
			return $arr;
			
		}
		
		public function del_data(){
			$arr = array();
			$id = I("post.id");
			$childs = $this->getChild($id);
			if($childs){
				$arr['del_error'] = 1;
				return $arr;
			}
			$status = $this->delete($id);
			$arr['status'] = $status;
			if($status){
				//更新缓存
				$this->clear_cate_list();
			}
			
			return $arr;
		}
		
		//更新缓存
		
		private function clear_cate_list(){
			F("CategoryTree",null);
			$this->getCategoryList();
		}
		
		//获取分类数据
		private function getCategoryList(){
			$data = $this->order("pid desc")->select();
			F("CategoryList",$data);
			$this->getTree();
		}
		//生成分类树
		public function getTree(){
			$data = F("CategoryList");
			if(!$data){
				$this->getCategoryList();
			}
			import("ORG.Util.Category");
			$cat=new \Think\Category(array('id','pid','title','cname'));
			$tree = $cat->getTree($data);
			F("CategoryTree",$tree);
			return $tree;
		}
		
		//获取所有子分类
		public function getChild($pid = ""){
			$data = F("CategoryList");
			//import("ORG.Util.Category");
			$cat=new \Think\Category(array('id','pid','title','cname'));
			$tree = $cat->getTree($data,$pid);
			return $tree;		
		}
		
	}
?>