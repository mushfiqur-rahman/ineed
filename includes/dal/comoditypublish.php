<?php

class comoditypublish extends base
{
	public $comodityId;
	public $startdate;
	public $endDate;
	public $userId;
	public $remarks;

	public function Insert()
	{
		$sql = "insert into comoditypublish(comodityId, startdate, endDate, userId, remarks) values(".$this->comodityId.",'".$this->startdate."','".$this->endDate."',".$this->userId.",'".$this->remarks."')";

		return $this->execute($sql);
	}

	public function Update()
	{
		$sql = "update comoditypublish set comodityId = ".$this->comodityId.",startdate = '".$this->startdate."',endDate = '".$this->endDate."', userId = ".$this->userId.",  remarks = '".$this->remarks."' where comodityId = ".$this->comodityId;

		return $this->execute($sql);
	}

	public function Delete()
	{
		$sql = "delete from comoditypublish where comodityId = ".$this->comodityId;

		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql = "select comodityId, startdate, endDate, userId, remarks from comoditypublish where comodityId = ".$this->comodityId;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select cmd.id, cmd.title as comodity, cp.startdate, cp.endDate, u.name as users, cp.remarks from comoditypublish as cp left join comodity as cmd on cp.comodityId = cmd.id left join users as u on cp.userId = u.id";
		return $this->executeTable($sql);
	}
}
