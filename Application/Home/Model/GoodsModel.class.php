<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model{
	protected $tableName = 'goods';
    // 对象的数据表
    protected $trueTableName = 'b_goods';

    public function addview($gid){
    	$this->where(array('gid' => $gid))->setInc('gview',1);
    }
    
    
}