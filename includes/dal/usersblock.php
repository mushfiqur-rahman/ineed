<?php
class usersblock extends base
{
	public $userId;	    
	public $dateFrom;
	public $dateTo;
	public $remarks;
	public $adminUserId;

	public function Insert()
{
	$sql = "insert into usersblock(userId, dateFrom, dateTo, remarks, adminUserId) values(".$this->userId.", '".$this->dateFrom."', '".$this->dateTo."', '".$this->remarks."', ".$this->adminUserId.")";
	return $this->execute($sql);

}

public function Update()
{
	$sql = "update usersblock set userId = '".$this->userId."', dateFrom = '".$this->dateFrom."', dateTo = '".$this->dateTo."', remarks = '".$this->remarks."', adminUserId = '".$this->adminUserId."' where userId = ".$this->id;
	return $this->execute($sql);
}
	
public function Delete()
{
	$sql = "delete from usersblock where userId = ".$this->id;
	return $this->execute($sql);
}
	
	public function SelectById()
	{
		$sql = "select userId, dateFrom, dateTo, remarks, adminUserId from usersblock where userId = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select u.id, u.name, u.email, u.contact, ub.dateFrom, ub.dateTo, ub.remarks, u2.email as admin  from usersblock as ub left join users as u on ub.userId = u.id
		left join users as u2 on ub.adminUserId = u2.id";
		return $this->executeTable($sql);
	}

}