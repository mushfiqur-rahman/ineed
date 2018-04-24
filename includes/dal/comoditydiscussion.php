<?php

class comoditydiscussion extends base
{
	public $id;
	public $comodityId;
	public $userId;
	public $dateTime;
	public $comments;

	
	public function Insert()
	{
		$sql= "insert into comoditydiscussion(comodityId, userId, comments) values(".$this->comodityId.", ".$this->userId.", '".$this->comments."')";
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql= "update comoditydiscussion set 
									 comodityId= ".$this->comodityId.",
									 userId= ".$this->userId.",
									 comments= '".$this->comments."' where comodityId = ".$this->comodityId;
		return $this->execute($sql);
	}
	
	public function Delete()
	{
		$sql= "delete from comoditydiscussion where comodityId = ".$this->comodityId;
		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql= "select comodityId, userId, comments from comoditydiscussion where comodityId = ".$this->comodityId;
		return $this->fillObject($sql);		 
	}
	
	
	public function Select()
	{
		$sql= "select c.id, c.title as name, u.name as userName, cd.comments from comoditydiscussion as cd left join comodity as c on cd.comodityId=c.id left join users as u on cd.userId=u.id";
		
		return $this->executeTable($sql);
	}
	
	
}