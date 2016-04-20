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
			$goodsmsg = D('goods')->where('gis_selloff=0')->select();
		}
		$this->assign('goodsmsg',$goodsmsg);
		//重复内容
		$this->shows();
        //

	}
	public function product(){
		$gid = I('get.gid');
		if(empty($gid))
		{
			$gid=1;
		}
		$goodsmsg = D('goods')->where(array('gid' => $gid))->select();
		//增加流量次数 !!!!用延迟会发生错误。。。。。并延迟60秒
		$r = D('goods')->addview($gid);

		$uname = D('user')->where(array('uid'=>$goodsmsg[0]['guid']))->select();
		$this->assign('uname',$uname[0]);

		$msglist = D('vmessage')->where('gid='.$gid)->select();
		$mcount = D('vmessage')->where('gid='.$gid)->count();
		if(empty($mcount))
			$mcount = 0;
		$this->assign('msglist',$msglist);
		$this->assign('mcount',$mcount);

		$goodsimgs = $goodsmsg[0]['gimgarray'];
		$goodsimgsarr = explode('?',$goodsimgs);
		$this->assign('goodsmsg',$goodsmsg[0]);
		$this->assign('goodsimgsarr',$goodsimgsarr);
		$type = D('type')->where(array('tid'=>$goodsmsg[0]['gtypeid']))->select();
		$this->assign('typename',$type[0]['tname']);
		$this->assign('tid',$type[0]['tid']);
		$goodsmsg4 = D('goods')->where('gis_selloff=0')->order('RAND()')->limit(4)->select();//SELECT * FROM `table` ORDER BY RAND() LIMIT 5 这个随机自己琢磨
		$this->assign('goodsmsg4',$goodsmsg4);
		//重复内容
        $this->shows();
        //
	}
	public function searchgoods(){
		$keyword = I('get.keyword');
		$goodslist = D('goods');
		$map['gname'] = array('like',"%".$keyword."%");
		$where['gis_selloff'] = 0;
		$goodsmsg = $goodslist->where($map)->where($where)->select();
		$this->assign('goodsmsg',$goodsmsg);
		//重复内容
        $this->shows();
        //
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
		//重复内容
        $this->shows();
        //
	}
	public function cart(){
		//重复内容
        $this->shows();
        //
	}
	public function deleteC(){
		$cid = I('get.cid');
		D('cart')->where(array('cid'=>$cid))->delete();
		$this->success("删除了");
	}
	//重复内容方法
	private function shows(){
		if(session('?logineduserid')){
			$this->assign('uid',session('logineduserid'));
			$cartnum = D('vcart')->where(array('uid'=>session('logineduserid')))->count();
			$cartmsg = D('vcart')->where(array('uid'=>session('logineduserid')))->select();
			$sumPrice = D('vcart')->where(array('uid'=>session('logineduserid')))->sum('gprice');
			if(empty($sumPrice))
				$sumPrice = "????";
		}
		else{
			$cartnum = 0;
			$sumPrice = "????";
		}
		$this->assign('sumPrice',$sumPrice);
		$this->assign('empty','<h2 class="empty">没有你的宝贝的爱包中…………</h2>');
		$this->assign('bcartmsg',$cartmsg);
		$this->assign('cartnum',$cartnum);
		$this->assign('cartmsg',$cartmsg);
		$this->display();
	}
}