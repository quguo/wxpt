<?php

//后台登录控制器
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {


	//登录处理
    public function index(){
       
    	$this->display();
    }

    public function do_login(){

        $name = I("username");
        $pwd  = sha1(I("pwd")) ;
        if(!$name || !$pwd){
           $this->error("请填写相关登录信息");

        }

        $info = M("admin")->where(array("name"=>$name,"pwd"=>$pwd))->find();
        //dump($info);
        if(!$info){
            $this->error("账号存在或被禁用");
        }

        
        session("uid",$info['id']);
        //session(C('USER_AUTH_KEY'),$info['id'] );
        session("title",$info['title']);
        session("sid",$info['sid']);
        $this->success("登录成功",U("Admin/Index"));
    }
    public function out(){
    	session(null);
    	$this->success("登出成功",U("Admin/Login"));
    }
}