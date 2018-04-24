<?php

class gender extends base
{
	public $id;
	public $name;
	public $description;
	
	
	public function Insert()
	{
		
		$sql = "insert into gender(name, description) values('".$this->name."', '".$this->description."')";
		return $this->execute($sql);
	}
	
	
	public function Update()
	{	
		$sql = "update gender set name = '".$this->name."', description = '".$this->description."' where id = ".$this->id;
		return $this->execute($sql);
	}
	
	public function Delete()
	{
		$sql = "delete from gender where id = ".$this->id;
		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql = "select id, name, description from gender where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select id, name, description from gender";
		return $this->executeTable($sql);
	}
	
}