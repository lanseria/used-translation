<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
	protected $tableName = 'cart';
    // 对象的数据表
    protected $trueTableName = 'b_cart';

    public function insertC($gid, $uid ,$cnum, $cprice, $ccreate_time){
    	$data['gid'] = $gid;
    	$data['uid'] = $uid;
    	$data['cnum'] = $cnum;
    	$data['cprice'] = $cprice;
    	$data['ccreate_time'] = $ccreate_time;
    	$this->create($data);
    	if($this->add()){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    public function updateC($gid, $uid ,$oldcnum, $addcnum){
    	$data['cnum'] = $addcnum + $oldcnum;
    	$this->where(array('gid'=>$gid,'uid'=>$uid))->create($data);
    	if($this->save()){
    		return true;
    	}
    	else return false;
    }
}