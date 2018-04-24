<?php

class comodity extends base
{
	public $id;
	public $title;
	public $description;
	public $conditionId;
	public $locationId;
	public $priorityId;
	public $dateTime;
	public $userId;
	public $ip;
	
	
	public function Insert()
	{
		$sql= "insert into comodity(title, description, conditionId, locationId, priorityId, userId, ip
		) values('".$this->title."', '".$this->description."', ".$this->conditionId.", ".$this->locationId.", ".$this->priorityId.", ".$this->userId.", '".$this->ip."')";
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql= "update comodity set 
						title= '".$this->title."', 
						description= '".$this->description."', 
						conditionId= ".$this->conditionId.", 
						locationId= ".$this->locationId.", 
						priorityId= ".$this->priorityId.", 
						userId= ".$this->userId.", 
						ip= '".$this->ip."' where id= ".$this->id;
		return $this->execute($sql);
	}
	
	public function Delete()
	{
		$sql= "delete from comodity where id= ".$this->id;
		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql= "select id, title, description, conditionId, locationId, priorityId,dateTime, userId, ip from comodity where id = ".$this->id;
		return $this->fillObject($sql);	
	}
	
	
	public function Select()
	{
		$sql= "select c.id, c.title as name, c.description, ccnd.name as 'condition', ccnd.rating as rating, l.name as location, p.name as priority, c.dateTime, u.name as users, c.userId, c.ip from comodity as c left join comoditycondition as ccnd on c.conditionId=ccnd.id left join location as l on c.locationId=l.id left join priority as p on c.priorityId=p.id left join users as u on c.userId=u.id where c.id > 0";
		
		if($this->id > 0)
		{
			$sql .= " and c.id = ".$this->id;
		}
		
		if($this->userId > 0)
		{
			$sql .= " and c.userId = ".$this->userId;
			$sql .= " or c.id in (select comodityId from messages where userId = ".$this->userId.")";
		}
		
		return $this->executeTable($sql);
	}
}