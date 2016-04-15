<?php
namespace Dashboard\Model;
use Think\Model;
class GoodsModel extends Model{
	protected $tableName = 'goods';
    // 对象的数据表
    protected $trueTableName = 'b_goods';
    public function insertG($gname, $gtypeid, $gcounts, $gprice, $goldprice, $guid, $gadname, $gadtel, $gimgarray, $gtimgarray, $gdetail){
    	$data['gname'] = $gname;
    	$data['gtypeid'] = $gtypeid;
        $data['gcounts'] = $gcounts;
    	$data['gprice'] = $gprice;
    	$data['goldprice'] = $goldprice;
    	$data['guid'] = $guid;
    	$data['gadname'] = $gadname;
    	$data['gadtel'] = $gadtel;
    	$data['gimgarray'] = $gimgarray;
        $data['gtimgarray'] = $gtimgarray;
    	$data['gdetail'] = $gdetail;
    	$data['gcreate_time'] = date('Y-m-d H:i:s');
    	$this->create($data);
    	if($this->add())
    	{
    		return true;
    	}
    	else return  false;
    }
    public function updateG($gid, $gname, $gtypeid, $gprice, $goldprice, $gadname, $gadtel, $gdetail){
        $data['gname'] = $gname;
        $data['gtypeid'] = $gtypeid;
        $data['gprice'] = $gprice;
        $data['goldprice'] = $goldprice;
        $data['gadname'] = $gadname;
        $data['gadtel'] = $gadtel;
        $data['gdetail'] = $gdetail;
        $this->where(array('gid'=>$gid))->create($data);
        if($this->save())
            return true;
        else
            return false;
    }
    public function selloff($gid){
        $data['gis_selloff'] = 1;
        $this->where(array('gid'=>$gid))->create($data);
        if($this->save())
            return true;
        else
            return false;
    }
    public function sellon($gid){
        $data['gis_selloff'] = 0;
        $this->where(array('gid'=>$gid))->create($data);
        if($this->save())
            return true;
        else
            return false;
    }
}