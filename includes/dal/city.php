<?php

class city extends base
{
	public $id;
	public $name;
	public $countryId;
	
	
	public function Insert()
	{
		
		$sql = "insert into city(name, countryId) values('".$this->name."', ".$this->countryId.")";
		return $this->execute($sql);
	}
	
	
	public function Update()
	{	
		$sql = "update city set name = '".$this->name."', countryId = ".$this->countryId." where id = ".$this->id;
		return $this->execute($sql);
	}
	
	public function Delete()
	{
		$sql = "delete from city where id = ".$this->id;
		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql = "select id, name, countryId from city where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select ct.id, ct.name, cn.name as country from city as ct left join country as cn on ct.countryId = cn.id where ct.id > 0";
		
		if($this->search != "")
			$sql .= " and ct.name like '%".$this->search."%'";
		
		if($this->countryId > 0)
			$sql .= " and cn.id = ".$this->countryId;
		
		return $this->executeTable($sql);
	}
	
}