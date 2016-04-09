<?php
namespace Dashboard\Controller;
use Think\Controller;
class AjaxController extends Controller {

	public function motifypwd(){
		$uid = I('post.uid');
		$pwd = I('post.pwd');
		$r = D('user')->doChangePwd($uid, $pwd);
		if($r){
			$this->ajaxReturn(true);
		}
		else
			$this->ajaxReturn(false);
	}
}