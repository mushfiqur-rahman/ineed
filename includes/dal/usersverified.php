<?php
class usersverified extends base
{
	public $userId;	    
	public $method;
	public $dateTime;
	public $adminUserId;

	public function Insert()
{
	$sql = "insert into usersverified(userId, method, adminUserId) values(".$this->userId.", '".$this->method."', ".$this->adminUserId.")";
	return $this->execute($sql);

}

public function Update()
{
	$sql = "update usersverified set userId = '".$this->userId."', method = '".$this->method."', adminUserId = '".$this->adminUserId."' where userId = ".$this->id;
	return $this->execute($sql);
}
	
public function Delete()
{
	$sql = "delete from usersverified where userId = ".$this->id;
	return $this->execute($sql);
}
	
	public function SelectById()
	{
		$sql = "select userId, method, dateTime, adminUserId from usersverified where userId = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select u.id, u.name, u.email, u.contact, uv.method, uv.dateTime, uv.adminUserId  from usersverified as uv left join users as u on uv.userId = u.id";
		return $this->executeTable($sql);
	}

}