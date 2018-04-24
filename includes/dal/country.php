<?php

class country extends base
{
	public $id;
	public $name;
	
	
	public function Insert()
	{
		
		$sql = "insert into country(name) values('".$this->name."')";
		return $this->execute($sql);
	}
	
	
	public function Update()
	{	
		$sql = "update country set name = '".$this->name."' where id = ".$this->id;
		return $this->execute($sql);
	}
	
	public function Delete()
	{
		$sql = "delete from country where id = ".$this->id;
		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql = "select id, name from country where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select id, name from country";
		if($this->search != "")
		{
			$sql .= " where name like '%".$this->search."%'";
		}
		return $this->executeTable($sql);
	}
	
}