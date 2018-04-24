<?php 

class location extends base 
{
    

public $id; 
public $name;
public $cityid; 

public function     Insert()
{
    
    $sql = "insert into location (name, cityid ) values('".$this->name."', ".$this->cityid.")";
    return $this->execute($sql);
}

public function     Update()
{
    
    $sql = "update location set 
        
        name = '".$this->name."' ,
        cityid= '.$this-> cityid.,
            where id= ".$this->id; 

    return $this->execute($sql);
}

public function     Delete()
{
    
    $sql = "delete from location where id= ".$this->id; 

    return $this->execute($sql);
}

public function SelectById()
	{
		$sql = "select id, name , cityid from location where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select l.id, l.name, ct.name as city, cn.name as country from location as l left join city as ct on l.cityId = ct.id left join country as cn on ct.countryId = cn.id";
		if($this->search != "")
		{
			$sql .= " where l.name like '%".$this->search."%'";
		}
		return $this->executeTable($sql);
	}



}

