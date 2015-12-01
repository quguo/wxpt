<?php
	namespace Admin\Model;
	use Think\Model\RelationModel;
	class ArticleModel extends RelationModel{
		
		protected $_auto = array(
			array("createtime",'time',1,'function'),//增加时自动填充时间
			array("updatetime","time",2,'function'),//更新时自动填充时间
		);
		
		protected $_link  = array(
			    'comments'=> array(  
			        'mapping_type'=>HAS_MANY,
                    'class_name'=>'comments',
                    'foreign_key'=>'aid',
			     ),
		);
		protected $_validate = array(

			array('gid',"require","请选择用户组"),//新增时验证
	
			
			array('title','require','请输入文章标题',1), //默认情况下用正则进行验证
			
			array('title','require','请输入文章标题',1), //默认情况下用正则进行验证
			
			array('status',"require","请选择状态",1),

		);
		
		//处理文章添加 编辑
		public function save_data(){
			$arr = array();
			if(!$this->create()){
				 $arr['create'] = $this->getError();
				 return $arr;
			}
			
			if(I("post.aid")){
				$arr['save'] = $this->save();
			}else{
				$arr['save'] = $this->add();
			}
			
			if($arr['save']){
				//更新缓存
				$this->clear_article_list();
			}
			return $arr;
			
		}
		
		//清除缓存
		private function clear_article_list(){
			F("get_article_list",null);
			$this->get_article_list();
		}
		//获致文章列表数据
		public function get_article_list(){
			$arr = array();
			if(!F("get_article_list")){
				$data = $this->order("updatetime desc")->select();
				F("get_article_list",$data);
			}
			$data = F("get_article_list");
			return $data;
		}
		
		//删除文章
		public function del_data($aid = 0){
			$del = $this->delete($aid);
			if(!del){
				return false;
			}
			$this->clear_article_list();
			return true;
		}
		
		//获取文章相关信息
		public function get_info($aid = 0){
			$arr = array();
			$arr = $info = $this->relation(true)->find($aid);
			return $arr;
		}
		
		//获取热闹文章
		
		public function getTopArticle(){
			$arr = array();
			$arr = S("getTopArticle");
			if(!S("getTopArticle")){
				$arr = $this->relation(true)->limit(6)->select($aid);
				S("getTopArticle",$arr,1800);
			}
			
			return $arr;
			
			
		}
	}
	
?>