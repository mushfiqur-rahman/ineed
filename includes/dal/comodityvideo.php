<?php

class comodityvideo extends base
{
	public $id;
	public $comodityId;
	public $videoLinke;
	public $title;
	
	public function insert()
	{
		$sql = "insert into comodityvideo(comodityId ,videoLink, title) values(".$this->comodityId." ,'".$this->videoLinke."', '".$this->title."')";
		
		return $this->execute($sql);
	}
	
	public function Update()
	{
		$sql = "update comodityvideo set comodityId = ".$this->comodityId.",videoLinke = '".$this->videoLinke."', title = '".$this->title."' where id = ".$this->id;
	}
	
	public function Delete()
	{
		$sql = "delete from comodityvideo where id = ".$this->id;
	}
	
	public function SelectById()
	{
		$sql = "select id, comodityId ,videoLinke, title from comodityvideo where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select cv.id, cmd.title as comodity , cv.videoLinke, cv.title from comodityvideo as cv left join comodity as cmd on cv.comodityId = cmd.id";
		return $this->executeTable($sql);
	}
}