<?php
namespace Dashboard\Controller;
use Think\Controller;
class IndexController extends Controller {
  public function index(){
    if(session('?logineduserid')){
      $uid = session('logineduserid');
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
     $uid = session('logineduserid');
     $goodsnum = D('goods')->where(array('guid' => $uid))->count();
     $goodsmem = D('vcart')->where(array('guid' => $uid))->count();
     $goodsview = D('goods')->where(array('guid' => $uid))->sum('gview');
     $goodsmessage = D('vmessage')->where(array('guid' => $uid))->count();
     if(empty($goodsview))
      $goodsview=0;
    $goodsmsg = D('goods')->where(array('guid' => $uid))->order('gview desc')->limit(5)->select();
    $usermsg = D('User')->where(array('uid' => $uid))->select();
    $this->assign('goodsmem',$goodsmem);
    $this->assign('goodsnum',$goodsnum);
    $this->assign('goodsview',$goodsview);
    $this->assign('goodsmessage',$goodsmessage);
    $this->assign('goodsmsg',$goodsmsg);
    $this->assign('usermsg',$usermsg[0]);
    $this->assign('aac','active');
    $this->display();
  }
  else{
    $this->error('只有管理员才可以进入,请先登录', '/Home/User/login');
  }
}
}