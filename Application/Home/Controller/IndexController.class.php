<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $goodsmsg = D('goods')->where('gis_selloff=0')->order('gcreate_time ASC')->select();
        $newgoodsmsg = D('goods')->where('gis_selloff=0')->order('gcreate_time DESC')->limit(7)->select();
        $this->assign('goodsmsg',$goodsmsg);
        $this->assign('newgoodsmsg',$newgoodsmsg);
        //重复内容
        $this->shows();
        //
    }
    public function about(){
        //重复内容
        $this->shows();
        //
    }
    public function contact(){
    	//重复内容
        $this->shows();
        //
    }
    public function blog(){
        //重复内容
        $this->shows();
        //
    }
    //重复内容方法
    private function shows(){
        if(session('?logineduserid')){
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
        $this->assign('cartnum',$cartnum);
        $this->assign('cartmsg',$cartmsg);
        $this->display();
    }
}