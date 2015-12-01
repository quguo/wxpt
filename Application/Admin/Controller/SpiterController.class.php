<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;

/**
* 
*/

class SpiterController extends CommonController
{
	public function index(){
		import('Org.JAE.QueryList');
        /*
			采集文章
        */
        //采集OSC的代码分享列表，标题 链接 作者
        // $url = "http://m.58.com/fs/renli/23942543576629x.shtml?adtype=1&entinfo=23942543576629_0&adact=3&type=4&psid=166985698189917714769598444&role=4&ad_id=164514964502776";
        // $reg = array(
        // 		"phone"=>array(".com_phone a","phoneno")
        // 		// "title"=>array(".code_title a:eq(0)","text"),
        // 		// "url"=>array(".code_title a:eq(0)","href"),
        // 		// "author"=>array("img","title")
        // 	);
        // $rang = ".apply_job_pre";
        // //使用curl抓取源码并以UTF-8编码格式输出
        // $query = new \QueryList($url,$reg,$rang,'curl','utf8');
        // $arr = $query->jsonArr;
       	
       	/*
			列表采集
       	*/
		$array = array();
		for ($i=1; $i < 2 ; $i++) { 
			
			$wb_api = "http://m.58.com/fs/yewu/pn".$i."/?58hm=m_home_job_full_xiaoshou&58cid=".$cid."&PGTID=0d100000-000d-e7b9-7139-5a032bee75a5&ClickID=1&segment=true";

	        $reg = array(
	        		"url"=>array(".title a:eq(0)","href"),

	        	); 
	        $rang = ".list-info li";
	        //使用curl抓取源码并以UTF-8编码格式输出
	       $query = new \QueryList($wb_api,$reg,$rang,'curl','utf8');
	       
	       $array[$i]= $query->jsonArr;
		}
		
        dump($array);
		$this->display();
		
	}

	

}

