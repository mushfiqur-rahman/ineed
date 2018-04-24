<?php
class base
{
	public $error;
	
	public $cn;
	
	public $search;
	
	public $LastId;
	
	public function __construct()
	{
		$this->cn = mysqli_connect("localhost", "root", "", "dbineed37");
	}
	
	public function execute($sql)
	{
		if(mysqli_query($this->cn, $sql))
		{
			$this->LastId = mysqli_insert_id($this->cn);
			return true;
		}
		$this->error = mysqli_error($this->cn);
		return false;
	}
	
	
	public function fillObject($sql)
	{
		$table = mysqli_query($this->cn, $sql);
		
		while($row = mysqli_fetch_assoc($table))
		{
			foreach($row as $k=>$v)
			{
				$this->$k = $v;
			}
			return true;
		}
		$this->error = mysqli_error($this->cn);
		return false;
	}
	
	public function executeTable($sql)
	{
		$a = array();
		$table = mysqli_query($this->cn, $sql);
		
		while($row = mysqli_fetch_assoc($table))
		{
			$a[] = $row;
		}
		$this->error = mysqli_error($this->cn);
		return $a;
	}
	
	public function makeDelete($value)
	{
		$this->id = $value;
		if($this->Delete())
		{
			return 'Data Deleted';
		}
		else{
			return $this->error; 
		}
	}
	
	public function fillData()
	{
		foreach($_POST as $k=>$v)
		{
			if($k == "submit")
				continue;
			
			$this->$k = $v;
		}
	}
	
}