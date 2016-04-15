<?php
namespace Dashboard\Controller;
use Think\Controller;
class GoodsController extends Controller {
	public function see(){
    if(session('?logineduserid')){
      $uid = session('logineduserid');
      $condition['guid'] = $uid;
      $condition['gis_selloff'] = 0;
      $goodsmsg = D('goods')->where($condition)->order('gcreate_time desc')->select();
      $usermsg = D('user')->where(array('uid' => $uid))->select();
      $this->assign('goodsmsg',$goodsmsg);
      $this->assign('usermsg',$usermsg[0]);
      $this->assign('cac','active');
      $this->display();
    }
    else{
      $this->error('只有管理员才可以进入,请先登录', '/Home/User/login');
    }
  }
  public function publiced(){
    if(session('?logineduserid')){

      if(IS_POST){
        $gname = I('post.gname');
        $gtypeid = I('post.gtypeid');
        $gcounts = I('post.gcounts');
        $gprice = I('post.gprice');
        $goldprice = I('post.goldprice');
        $guid = session('logineduserid');
        $gadname = I('post.gadname');
        $gadtel = I('post.gadtel');
        $gdetail = I('post.gdetail');

        $gimgarray= array();
        $image = new \Think\Image(); 
        $upload = new \Think\Upload();
        $upload->maxSize   =     3145728 ;
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath  =     './Public/pic/'; 
        $upload->savePath  =     ''; 
        $info   =   $upload->upload();
        if(!$info) {
          $this->error($upload->getError());
        }else{
          foreach($info as $k => $file){
            $gimgarray[$k]=$file['savepath'].$file['savename'];
          }
        }
        foreach ($gimgarray as $k => $path) {
          $image->open('./Public/pic/'.$path);
          $image->thumb(500, 500, 2)->save('./Public/pic/'.$path);
        }
        $gimgstr = implode('?',$gimgarray);
        $r = D('goods')->insertG($gname, $gtypeid, $gcounts, $gprice, $goldprice, $guid, $gadname, $gadtel, $gimgstr, $gtimgstr, $gdetail);
        if($r){
          $this->success('发布成功');
        }
        else{
          $this->error('发布失败，请检查');
        }
      }
      else{
        $typemsg = D('type')->select();
        $this->assign('typemsg',$typemsg);

        $uid = session('logineduserid');
        $usermsg = D('User')->where(array('uid' => $uid))->select();
        $this->assign('usermsg',$usermsg[0]);
        $this->assign('fac','active');
        $this->display();
      }
    }
    else{
      $this->error('只有管理员才可以进入,请先登录', '/Home/User/login');
    }
  }
  public function updategood(){
    if(session('?logineduserid')){
      if(IS_POST){
        $gid = I('post.gid');
        $gname = I('post.gname');
        $gtypeid = I('post.gtypeid');
        $gprice = I('post.gprice');
        $goldprice = I('post.goldprice');
        $gadname = I('post.gadname');
        $gadtel = I('post.gadtel');
        $gdetail = I('post.gdetail');

        $r = D('goods')->updateG($gid, $gname, $gtypeid, $gprice, $goldprice, $gadname, $gadtel, $gdetail);
        if($r){
          $this->success('修改成功');
        }
        else{
          $this->error('修改失败，请检查');
        }
      }
      else{
        $gid = I('get.gid');
        $goodmsg = D('goods')->where(array('gid'=>$gid))->select();
        $this->assign('goodmsg',$goodmsg[0]);


        $typemsg = D('type')->select();
        $this->assign('typemsg',$typemsg);

        $uid = session('logineduserid');
        $usermsg = D('User')->where(array('uid' => $uid))->select();
        $this->assign('usermsg',$usermsg[0]);
        $this->assign('fac','active');
        $this->display();
      }
    }
    else{
      $this->error('只有管理员才可以进入,请先登录', '/Home/User/login');
    }
  }
  public function selloffG(){
    $gid = I('get.gid');
    if(D('goods')->selloff($gid))
      $this->success('已下架','javascript:window.location.href=document.referrer;');
    else
      $this->error('下架失败','javascript:window.location.href=document.referrer;',1);
  }
  public function sellonG(){
    $gid = I('get.gid');
    if(D('goods')->sellon($gid))
      $this->success('已重新上架','javascript:window.location.href=document.referrer;');
    else
      $this->error('上架失败','javascript:window.location.href=document.referrer;',1);
  }
}
?>