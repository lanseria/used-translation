<?php
namespace Dashboard\Controller;
use Think\Controller;
class AdminController extends Controller {
	public function users(){
		if(session('?logineduserid')&&(session('loginedusertype')==0)){
			$userlist = D('User')->where(array('utype' => 1))->select();
			$this->assign('userlist',$userlist);
			$uid = session('logineduserid');
			$usermsg = D('User')->where(array('uid' => $uid))->select();
			$this->assign('usermsg',$usermsg[0]);
			$this->assign('lac','active open');
			$this->assign('sac','active');
			$this->display();
		}
		else{
			$this->error('只有管理员才可以进入,请先登录', '/Manager/User/login');
		}
	}
	public function goods(){
		if(session('?logineduserid')&&(session('loginedusertype')==0)){
			$goodslist = D('goods')->select();
			$this->assign('goodslist',$goodslist);
			$uid = session('logineduserid');
			$usermsg = D('User')->where(array('uid' => $uid))->select();
			$this->assign('usermsg',$usermsg[0]);
			$this->assign('lac','active open');
			$this->assign('eac','active');
			$this->display();
		}
		else{
			$this->error('只有管理员才可以进入,请先登录', '/Manager/User/login');
		}
	}
	public function analyze(){
		if(session('?logineduserid')&&(session('loginedusertype')==0)){
			$goodsnum = D('goods')->count();
			$goodsmem = D('vcart')->count();
			$goodsview = D('goods')->sum('gview');
			$goodsmessage = D('vmessage')->count();
			if(empty($goodsview))
				$goodsview=0;
			$goodsmsg = D('goods')->order('gview desc')->limit(5)->select();
			$usercount = D('User')->count();
			$this->assign('usercount',$usercount);
			$this->assign('goodsmem',$goodsmem);
			$this->assign('goodsnum',$goodsnum);
			$this->assign('goodsview',$goodsview);
			$this->assign('goodsmessage',$goodsmessage);
			$this->assign('goodsmsg',$goodsmsg);
			$uid = session('logineduserid');
			$usermsg = D('User')->where(array('uid' => $uid))->select();
			$this->assign('usermsg',$usermsg[0]);
			$this->assign('lac','active open');
			$this->assign('zac','active');
			$this->display();
		}
		else{
			$this->error('只有管理员才可以进入,请先登录', '/Manager/User/login');
		}
	}
	public function del(){
		$uid = I('get.uid');
		$r = D('user')->where(array('uid'=>$uid))->delete();
		if($r)
			$this->success("删除了");
		else
			$this->error("删除失败");
	}
}