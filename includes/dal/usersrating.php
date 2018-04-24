<?php
class usersrating extends base
{
	public $userId;	    
	public $rateByUserId;
	public $dateTime;
	public $rating;

	public function Insert()
{
	$sql = "insert into usersrating(userId, rateByUserId, rating) values(".$this->userId.", ".$this->rateByUserId.", ".$this->rating.")";
	return $this->execute($sql);

}

public function Update()
{
	$sql = "update usersrating set userId = '".$this->userId."', rateByUserId = '".$this->rateByUserId."', rating = '".$this->rating."' where userId = ".$this->id;
	return $this->execute($sql);
}
	
public function Delete()
{
	$sql = "delete from usersrating where userId = ".$this->id;
	return $this->execute($sql);
}
	
	public function SelectById()
	{
		$sql = "select userId, rateByUserId, dateTime, rating from usersrating where userId = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select u.id, u.name, u.email, u.contact, ur.rateByUserId, ur.dateTime, ur.rating from usersrating as ur left join users as u on ur.userId = u.id where u.id > 0 ";
		
		if($this->userId > 0)
		{
			$sql .= " and u.id = ".$this->userId;
		}
		
		return $this->executeTable($sql);
	}

}
