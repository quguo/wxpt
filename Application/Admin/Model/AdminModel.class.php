<?php
	namespace Admin\Model;
	use Think\Model\RelationModel;
class AdminModel extends RelationModel{
	protected $tableName = "admin";
	protected $_link = array(
	    
	 	'group' => array(    
			 'mapping_type'  => self::BELONGS_TO,    
			 'class_name'    => 'auth_group',    
			 'foreign_key'   => 'gid',    
			 'mapping_name'  => 'group',    
			 ),
	 	


 	);
	protected $_validate = array(

		array('gid',"require","请选择用户组"),//新增时验证
		array('name','require','请输入账号',0), //新增时验证账号
		array('name','','此账号已经存在！',0,'unique',1), // 新增时验证账号唯一
		array('name','checkUserName',"账号格式不正确",1,'callback'),// 新增时验证账号格式

		array('pwd','require','请输入密码'), 
		array('pwd','checkPwd','密码格式不正确',1,'callback'), // 自定义函数验证密码格式
		array('repassword','require','请再次输入密码'), 
		array('repassword','pwd','密码不一样',1,'confirm'), // 验证确认密码是否和密码一致

		array('status',"require","请选择状态"),

	);

	public function checkUserName(){
		return true;
	}

	public function checkPwd(){
		return true;
	}

	public function getUserInfo($uid,$type){
		$info = $this->where(array("id"=>$uid))->find();
		return $info[$type];
	}
	
 }
?>