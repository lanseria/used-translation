<?php
namespace Dashboard\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(session('?logineduserid')){
            $uid = I('get.uid');
            $usermsg = D('User')->where(array('uid' => $uid))->select();
            $this->assign('usermsg',$usermsg[0]);
            $this->assign('gac','active');
            $this->display();
        }
        else{
            $this->error('只有管理员才可以进入,请先登录', '/Home/User/login');
        }
    }
    public function about(){
        if(session('?logineduserid')){
           $uid = I('get.uid');
           $usermsg = D('User')->where(array('uid' => $uid))->select();
           $this->assign('usermsg',$usermsg[0]);
           $this->assign('aac','active');
           $this->display();
       }
       else{
        $this->error('只有管理员才可以进入,请先登录', '/Home/User/login');
    }
}
}