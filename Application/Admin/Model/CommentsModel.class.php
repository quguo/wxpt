<?php
	namespace Admin\Model;
	use Think\Model;
class CommentsModel extends Model{
	protected $_auto = array(
		
		array("createtime","time",1,"function"),
		array("status","1",1)
		
	);
	protected $_validate = array(

		array('aid',"require","缺少文章ID"),//新增时验证

		array('title','require','请输入文章标题',1), //默认情况下用正则进行验证
		
		array('content','require','请输入内容',1), //默认情况下用正则进行验证

	);
	
	public function save_data(){
		$arr = array();
		
		if(!$this->create()){
			$arr['create'] = $this->getError();
		}
		
		$status = $this->add();
		$arr['save'] = $status;
		return $arr;
	}
}
?>