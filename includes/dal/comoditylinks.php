<?php

class comoditylinks extends base
{
	public $id;
	public $comodityId;
	public $Link;
	public $title;
	
	public function insert()
	{
		$sql = "insert into comoditylinks(comodityId, Link, title) values(".$this->comodityId.", '".$this->Link."', '".$this->title."')";
		
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql = "update comoditylinks set comodityId = ".$this->comodityId.",Link = '".$this->Link."', title = '".$this->title."') where id = ".$this->id;
	}
	
	public function Delete()
	{
		$sql = "delete from comoditylinks where id = ".$this->id;
	}
	
	public function SelectById()
	{
		$sql = "select id, comodityId ,Link, title from comoditylinks where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select cml.id, cmd.title as comodity ,cml.Link, cml.title from comoditylinks as cml left join comodity as cmd on cml.comodityId = cmd.id ";
		return $this->executeTable($sql);
	}
}