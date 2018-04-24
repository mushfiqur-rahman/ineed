<?php

class messages extends base
{
	public $id;
	public $comodityId;
	public $userId;
	public $dateTime;
	public $message;
	
	public function insert()
	{
		$sql = "insert into messages(comodityId, userId, message) values(".$this->comodityId." ,".$this->userId.", '".$this->message."')";
		
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql = "update messages set comodityId = ".$this->comodityId.",userId = '".$this->userId."', dateTime = '".$this->dateTime."', message = '".$this->message."') where id = ".$this->id;
	}
	
	public function Delete()
	{
		$sql = "delete from messages where id = ".$this->id;
	}
	
	public function SelectById()
	{
		$sql = "select id, comodityId, userId, dateTime, message from messages where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select m.id, cmd.title as comodity, u.name as user, m.dateTime, m.message from messages as m left join comodity as cmd on m.comodityId = cmd.id left join users as u on m.userId = u.id where cmd.id > 0";
		
		if($this->comodityId > 0)
		{
			$sql .= " and cmd.id = ".$this->comodityId;
		}
		if($this->userId > 0)
		{
			$sql .= " and (m.userId = ".$this->userId." or cmd.userId = ".$this->userId.")";
		}
		
		return $this->executeTable($sql);
	}
}