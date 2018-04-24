<?php

class comoditycondition extends base
{
	public $id;
	public $name;
	public $description;
	public $rating;
	
	public function Insert()
	{
		$sql= "insert into comoditycondition(name, description, rating) values('".$this->name."', '".$this->description."', ".$this->rating.")";
		return $this->execute($sql);
	}
	
	public function Update()
	{	
		$sql = "update comoditycondition set name = '".$this->name."', description = '".$this->description."' , rating= ".$this->rating." where id = ".$this->id;
		return $this->execute($sql);
	}
	
	public function Delete()
	{
		$sql= "delete from comoditycondition where id = ".$this->id;
		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql= "select id, name, description, rating from comoditycondition where id = ".$this->id;
		return $this->fillObject($sql);	
	}
	
	
	public function Select()
	{
		$sql= "select id, name, description, rating from comoditycondition";
		return $this->executeTable($sql);
	}
	
}