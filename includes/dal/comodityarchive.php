<?php

class comodityarchive extends base
{
	public $comodityId;
	public $userId;
	public $dateTime;
	public $remarks;

	public function Insert()
	{
		$sql = "insert into comodityarchive(comodityId, userId, dateTime, remarks) values(".$this->comodityId.",".$this->userId.",'".$this->dateTime."','".$this->remarks."')";

		return $this->execute($sql);
	}

	public function Update()
	{
		$sql = "update comodityarchive set comodityId = ".$this->comodityId.", userId = ".$this->userId.", dateTime = '".$this->dateTime."', remarks = '".$this->remarks."' where id = ".$this->id;

		return $this->execute($sql);
	}

	public function Delete()
	{
		$sql = "delete from comodityarchive where id = ".$this->id;

		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql = "select comodityId, userId, dateTime, remarks from comodityarchive where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select cmd.id, cmd.title as name, u.name as users, ca.dateTime, ca.remarks from comodityarchive as ca left join comodity as cmd on ca.comodityId = cmd.id left join users as u on ca.userId = u.id";
		return $this->executeTable($sql);
	}
}
