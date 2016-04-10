<?php
namespace Home\Model;
use Think\Model;
class MessageModel extends Model{
	protected $tableName = 'message';
    // 对象的数据表
	protected $trueTableName = 'b_message';

	public function addMessage($mgid, $muid, $mcontent){
		$data['mgid'] = $mgid;
		$data['muid'] = $muid;
		$data['mcontent'] = $mcontent;
		$data['mcreate_time'] = date('Y-m-d H:i:s');
		if($this->create($data)){
			$this->add();
			return true;
		}
		else{
			return false;
		}
	}
}