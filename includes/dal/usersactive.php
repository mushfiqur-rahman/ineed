<?php
class uactive extends base
{
	public $userId;	    
	public $dateTime;
	public $ip;

	public function Insert()
{
	$sql = "insert into usersactive(userId, ip) values(".$this->usersId.", '".$this->ip."')";
	return $this->execute($sql);

}

public function Update()
{
	$sql = "update usersactive set userId = '".$this->userId."', ip = '".$this->ip."' where id = ".$this->id;
	return $this->execute($sql);
}
	
public function Delete()
{
	$sql = "delete from usersactive where id = ".$this->id;
	return $this->execute($sql);
}
	
	public function SelectById()
	{
		$sql = "select userId, dateTime, ip from usersactive where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select u.id, u.name, u.email, u.contact, ua.dateTime, ua.ip from usersactive as ua left join users as u on ua.userId = u.id";
		return $this->executeTable($sql);
	}

}
