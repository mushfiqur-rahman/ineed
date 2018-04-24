<?php

class comoditysold extends base
{
	public $comodityId;
	public $userId;
	public $dateTime;
	public $remarks;
	
	public function insert()
	{
		$sql = "insert into comoditysold(comodityId, userId, dateTime, remarks) values(".$this->comodityId." ,".$this->userId.", '".$this->dateTime."', '".$this->remarks."')";
		
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql = "update comoditysold set comodityId = ".$this->comodityId.",userId = '".$this->userId."', dateTime = '".$this->dateTime."', remarks = '".$this->remarks."') where id = ".$this->id;
	}
	
	public function Delete()
	{
		$sql = "delete from comoditysold where id = ".$this->id;
	}
	
	public function SelectById()
	{
		$sql = "select comodityId, userId, dateTime, remarks from comoditysold where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select cmd.id, cmd.title as comodity, u.name as user, cms.dateTime, cms.remarks from comoditysold as cms left join comodity as cmd on cms.comodityId = cmd.id left join users as u on cms.userId = u.id";
		return $this->executeTable($sql);
	}
}