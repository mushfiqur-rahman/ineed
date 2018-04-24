<?php

class comodityreject extends base
{
	public $comodityId;
	public $userId;
	public $dateTime;
	public $remarks;

	public function Insert()
	{
		$sql = "insert into comodityreject(comodityId, userId, dateTime, remarks) values(".$this->comodityId.",".$this->userId.",'".$this->dateTime."','".$this->remarks."')";

		return $this->execute($sql);
	}

	public function Update()
	{
		$sql = "update comodityreject set comodityId = ".$this->comodityId.", userId = ".$this->userId.", dateTime = '".$this->dateTime."', remarks = '".$this->remarks."' where comodityId = ".$this->comodityId;

		return $this->execute($sql);
	}

	public function Delete()
	{
		$sql = "delete from comodityreject where comodityId = ".$this->comodityId;

		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql = "select comodityId, userId, dateTime, remarks from comodityreject where comodityId = ".$this->comodityId;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select cmd.id, cmd.title as comodity, u.name as users, cr.dateTime, cr.remarks from comodityreject as cr left join comodity as cmd on cr.comodityId = cmd.id left join users as u on cr.userId = u.id";
		return $this->executeTable($sql);
	}
}
