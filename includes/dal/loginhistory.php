<?php

class loginhistory extends base
{
	public $userId;
	public $dateTime;
	public $ip;
	
	public function Insert()
	{
		$sql= "insert into loginhistory(userId, ip) values(".$this->userId.", '".$this->ip."')";
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql= "update loginhistory set userId = ".$this->userId.", ip= '".$this->ip."' where userId = ".$this->userId;
		return $this->execute($sql);
	}
	
	public function Delete()
	{
		$sql= "delete from loginhistory where userId = ".$this->userId;
		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql= "select userId, dateTime ip from loginhistory where userId = ".$this->userId;
		return $this->fillObject($sql);		 
	}
	
	
	public function Select()
	{
		$sql= "select u.id, u.name as name, lgh.dateTime, lgh.ip from loginhistory as lgh left join users as u on lgh.userId=u.id";
		
		return $this->executeTable($sql);
	}
	
	
}