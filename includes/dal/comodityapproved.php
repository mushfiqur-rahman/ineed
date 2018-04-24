<?php

class comodityapproved extends base
{
	
	public $comodityId;
	public $userId;
	public $dateTime;
	public $remarks;

	
	public function Insert()
	{
		$sql= "insert into comodityapproved(comodityId, userId, remarks) values(".$this->comodityId.", ".$this->userId.", '".$this->remarks."')";
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql= "update comodityapproved set 
									 comodityId= ".$this->comodityId.",
									 userId= ".$this->userId.",
									 remarks= '".$this->remarks."' where comodityId = ".$this->comodityId;
		return $this->execute($sql);
	}
	
	public function Delete()
	{
		$sql= "delete from comodityapproved where comodityId = ".$this->comodityId;
		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql= "select comodityId, userId, remarks from comodityapproved where comodityId = ".$this->comodityId;
		return $this->fillObject($sql);		 
	}
	
	
	public function Select()
	{
		$sql= "select c.id, c.title as name, u.name as userName, cap.remarks from comodityapproved as cap left join comodity as c on cap.comodityId=c.id left join users as u on cap.userId=u.id";
		
		return $this->executeTable($sql);
	}
	
	
}