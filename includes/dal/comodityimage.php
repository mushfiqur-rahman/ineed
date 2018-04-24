<?php

class comodityimage extends base
{
	public $id;
	public $comodityId;
	public $image;
	public $title;
	
	public function insert()
	{
		$sql = "insert into comodityimage(comodityId ,image, title) values(".$this->comodityId." ,'".$this->image."', '".$this->title."')";
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql = "update comodityimage set comodityId = ".$this->comodityId.",image = '".$this->image."', title = '".$this->title."') where id = ".$this->id;
	}
	
	public function Delete()
	{
		$sql = "delete from comodityimage where id = ".$this->id;
	}
	
	public function SelectById()
	{
		$sql = "select id, comodityId ,image, title from comodityimage where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select cmi.id, cmd.title as comodity, cmi.image, cmi.title from comodityimage as cmi left join comodity as cmd on cmi.comodityId = cmd.id where cmd.id > 0";
		
		if($this->comodityId > 0)
		{
			$sql.= " and cmd.id = ".$this->comodityId;
		}
		
		return $this->executeTable($sql);
	}
}