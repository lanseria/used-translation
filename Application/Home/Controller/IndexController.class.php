<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$goodstable = 
        $goodsmsg = D('goods')->where('gis_selloff=0')->order('gcreate_time DESC')->select();
        $newgoodsmsg = D('goods')->where('gis_selloff=0')->order('gcreate_time ASC')->limit(7)->select();
        $this->assign('goodsmsg',$goodsmsg);
        $this->assign('newgoodsmsg',$newgoodsmsg);
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
    public function about(){
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
    public function blog(){
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
    public function contact(){
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
}