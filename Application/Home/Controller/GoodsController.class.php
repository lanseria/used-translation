<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
	public function category(){
		$tid = I('get.tid');
		$typename = D('type')->where(array('tid'=>$tid))->select();
		$typename = $typename[0]['tname'];
		$this->assign('typename',$typename);

		$goodsmsg = D('goods')->where('gis_selloff=0')->where(array('gtypeid' => $tid))->select();
		if(empty($tid))
		{
			$goodsmsg = D('goods')->select();
		}
		$this->assign('goodsmsg',$goodsmsg);
		if(session('?logineduserid')){
			$cartnum = D('vcart')->where(array('uid'=>session('logineduserid')))->count();
			$cartmsg = D('vcart')->where(array('uid'=>session('logineduserid')))->select();
			$sumPrice = D('vcart')->sum('gprice');
        }
        else{
            $cartnum = 0;
            $sumPrice = "????";
        }
		$this->assign('sumPrice',$sumPrice);
		$this->assign('cartnum',$cartnum);
		$this->assign('cartmsg',$cartmsg);
		$this->display();
	}
	public function product(){
		$gid = I('get.gid');
		if(empty($gid))
		{
			$gid=1;
		}
		$goodsmsg = D('goods')->where(array('gid' => $gid))->select();
		//增加流量次数 并延迟60秒
        D('goods')->where(array('gid' => $gid))->setInc('gview',1,60);

		$uname = D('user')->where(array('uid'=>$goodsmsg[0]['guid']))->select();
		$this->assign('uname',$uname[0]);

		$goodsimgs = $goodsmsg[0]['gimgarray'];
		$goodsimgsarr = explode('?',$goodsimgs);
		$this->assign('goodsmsg',$goodsmsg[0]);
		$this->assign('goodsimgsarr',$goodsimgsarr);
		$type = new \Think\Model();
		$typename = $type->query('select * from b_type where tid='.$goodsmsg[0]['gtypeid']);
		$this->assign('typename',$typename[0]['tname']);
		$this->assign('tid',$typename[0]['tid']);
		$goodsmsg4 = D('goods')->where('gis_selloff=0')->limit(4)->select();
		$this->assign('goodsmsg4',$goodsmsg4);

		if(session('?logineduserid')){
			$cartnum = D('vcart')->where(array('uid'=>session('logineduserid')))->count();
			$cartmsg = D('vcart')->where(array('uid'=>session('logineduserid')))->select();
			$sumPrice = D('vcart')->sum('gprice');
        }
        else{
            $cartnum = 0;
            $sumPrice = "????";
        }
		$this->assign('sumPrice',$sumPrice);
		$this->assign('cartnum',$cartnum);
		$this->assign('cartmsg',$cartmsg);
		$this->display();
	}
	public function user(){
		$guid = I('get.uid');
		$uname = D('user')->where(array('uid'=>$guid))->select();
		$this->assign('uname',$uname[0]);
		$goodsmsg = D('goods')->where('gis_selloff=0')->where(array('guid' => $guid))->select();
		if(empty($guid))
		{
			$goodsmsg = D('goods')->select();
		}
		$this->assign('goodsmsg',$goodsmsg);
		if(session('?logineduserid')){
			$cartnum = D('vcart')->where(array('uid'=>session('logineduserid')))->count();
			$cartmsg = D('vcart')->where(array('uid'=>session('logineduserid')))->select();
			$sumPrice = D('vcart')->sum('gprice');
        }
        else{
            $cartnum = 0;
            $sumPrice = "????";
        }
		$this->assign('sumPrice',$sumPrice);
		$this->assign('cartnum',$cartnum);
		$this->assign('cartmsg',$cartmsg);
		$this->display();
	}
	public function cart(){
		if(session('?logineduserid')){
			$cartnum = D('vcart')->where(array('uid'=>session('logineduserid')))->count();
			$cartmsg = D('vcart')->where(array('uid'=>session('logineduserid')))->select();
			$sumPrice = D('vcart')->sum('gprice');
        }
        else{
            $cartnum = 0;
            $sumPrice = "????";
        }
		$this->assign('sumPrice',$sumPrice);
		$this->assign('empty','<h2 class="empty">没有你的宝贝的爱包中…………</h2>');
		$this->assign('cartnum',$cartnum);
		$this->assign('cartmsg',$cartmsg);
		$this->assign('bcartmsg',$cartmsg);
		$this->display();
	}
	public function deleteC(){
		$cid = I('get.cid');
		D('cart')->where(array('cid'=>$cid))->delete();
		$this->success("删除了");
	}
}