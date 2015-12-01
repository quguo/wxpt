<?php
	namespace Admin\Controller;
	use Admin\Controller\CommonController;
	class ArticleController extends CommonController{
		
		public function index(){
			$article = D("Article");
			$data = $article->get_article_list();
			//dump($data);
			$this->datalist = $data;
			$this->display();
		}
		
		public function add(){
			
			$catelist = D("Category")->getTree();

			$this->catelist = $catelist;
			$this->display();
		}
		
		public function edit(){
			$aid = I("aid");
			$article = D("Article");
			$catelist = F("CategoryTree");
			$artice_info = $article->get_info($aid);
			//dump($artice_info);
			$this->info = $artice_info;
			$this->catelist = $catelist;
			$this->display("add");
		}
		
		public function del(){
			$article = D("Article");
			$aid = I("aid");
			$sysinfo = $article->del_data($aid);
			if(!$sysinfo){
				$this->error("出错");
				//error("出错");
			}
			$this->success("成功");

		}
		
		public function save_data(){
			$article = D("Article");
			$sysinfo = $article -> save_data();
			if($sysinfo['create']){
				$this->error($sysinfo['create']);
			}
			
			if(!$sysinfo['save']){
				$this->error("操作出错");
			}
			$this->success("操作成功");
		}
		
		public function upload(){
			//import('ORG.Net.UploadFile');
			// $upload = new \Think\Upload();// 实例化上传类
			// $upload->maxSize  = 3145728 ;// 设置附件上传大小
			// $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			// $upload->savePath =  './Public/Uploads/';// 设置附件上传目录
			
			
			
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
			$upload->savePath  =     ''; // 设置附件上传（子）目录
			// 上传文件 
			$info   =   $upload->upload();
			
			if(!$info) {// 上传错误提示错误信息
				$arr['error'] = 1;
				$arr['msg']   = "上传出错";
				echo json_encode($arr);
			}else{// 上传成功
				$data['error'] = 0;
				$data['msg'] =  $info['file']['savepath'].$info['file']['savename'];
				echo json_encode($data);
			}
			die;		
		}
		
	}
	
?>