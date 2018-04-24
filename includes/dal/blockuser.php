<?php
class blockuser extends base
{
	public $userId;	    
	public $dateFrom;
	public $dateTo;
	public $remark;
	public $adminUserId;

	public function Insert()
{
	$sql = "insert into usersblock(userId, dateFrom, dateTo, remark, adminUserId) values(".$this->usersId.", '".$this->dateFrom."', '".$this->dateTo."', '".$this->remark."', ".$this->adminUserId.")";
	return $this->execute($sql);

}

public function Update()
{
	$sql = "update usersblock set userId = '".$this->userId."', dateFrom = '".$this->dateFrom."', dateTo = '".$this->dateTo."', remark = '".$this->remark."', adminUserId = ".$this->adminUserId." where id = ".$this->id;
	return $this->execute($sql);
}
	
public function Delete()
{
	$sql = "delete from usersblock where id = ".$this->id;
	return $this->execute($sql);
}
	
	public function SelectById()
	{
		$sql = "select id, userId, dateFrom, dateTo, remark, adminUserId from usersblock where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select id, userId, dateFrom, dateTo, remark, adminUserId from usersblock";
		return $this->executeTable($sql);
	}

}
