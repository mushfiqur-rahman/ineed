<?php

class comodityprice extends base
{
	public $comodityId;
	public $regularPrice;
	public $Price;

	public function Insert()
	{
		$sql = "insert into comodityprice(comodityId, regularPrice, Price) values(".$this->comodityId.",'".$this->regularPrice."','".$this->Price."')";

		return $this->execute($sql);
	}

	public function Update()
	{
		$sql = "update comodityprice set comodityId = ".$this->comodityId.", regularPrice = '".$this->regularPrice."', price = '".$this->Price."' where comodityId = ".$this->comodityId;

		return $this->execute($sql);
	}

	public function Delete()
	{
		$sql = "delete from comodityprice where comodityId = ".$this->comodityId;

		return $this->execute($sql);
	}
	
	public function SelectById()
	{
		$sql = "select comodityId, regularPrice, Price from comodityprice where comodityId = ".$this->comodityId;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select cmd.id, cmd.title as comodity, cmp.regularPrice, cmp.price from comodityprice as cmp left join comodity as cmd on cmp.comodityId = cmd.id where cmd.id > 0";
		
		if($this->comodityId > 0)
		{
			$sql .= " and cmd.id = ".$this->comodityId;
		}
		
		return $this->executeTable($sql);
	}
}
