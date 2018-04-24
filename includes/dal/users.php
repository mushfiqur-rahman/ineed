<?php

class users extends base
{
public $id; 
public $name;
public $contact; 
public $email; 
public $password;
public $dob; 
public $genderId; 
public $address; 
public $cityId; 
public $image; 
public $type; 
public $createDate; 
public $createIp;

public function Insert()
{
	$sql = "insert into users(name, contact, email, password, dob, genderId, address, cityId, image, type, createDate, createIp) values('".$this->name."', '".$this->contact."', '".$this->email."', password('".$this->password."'), '".$this->dob."', ".$this->genderId.", '".$this->address."', ".$this->cityId.", '".$this->image."', '".$this->type."', '".$this->createDate."', '".$this->createIp."' )";
	
	return $this->execute($sql);
}

public function Update()
{
	$sql = "update users set name = '".$this->name."', 
				contact = '".$this->contact."', 
				email = '".$this->email."', 
				password = password('".$this->password."'), 
				dob = '".$this->dob."', 
				genderId = ".$this->genderId.", 
				address = '".$this->address."', 
				cityId = ".$this->cityId.", 
				image = '".$this->image."', 
				type = '".$this->type."', 
				createDate = '".$this->createDate."', 
				createIp = '".$this->createIp."'  where id = ".$this->id;
	
	return $this->execute($sql);
}
	
public function Delete()
{
	$sql = "delete from users   where id = ".$this->id;
	
	return $this->execute($sql);
}
	
	public function SelectById()
	{
		$sql = "select id, name, contact, email, password, dob, genderId, address, cityId, image, type, createDate, createIp from users where id = ".$this->id;
		return $this->fillObject($sql);
	}
	
	public function Login()
	{
		$sql = "select id, name, contact, email, password, dob, genderId, address, cityId, image, type, createDate, createIp from users where email = '".$this->email."' and password = password('".$this->password."')";
		return $this->fillObject($sql);
	}
	
	public function Select()
	{
		$sql = "select u.id, u.name, u.contact, u.email, u.dob, g.name as gender, u.address, ct.name as city, cn.name as country, u.image, u.type, u.createDate, u.createIp from users as u left join gender as g on u.genderId = g.id left join city as ct on u.cityId = ct.id left join country as cn on ct.countryId = cn.id";
		if($this->search != "")
		{
			$sql .= " where (u.name like '%".$this->search."%' or u.contact like '%".$this->search."%' or u.email like '%".$this->search."%' or u.address like '%".$this->search."%')";
		}
		
		if($this->genderId > 0)
		{
			$sql .= " and g.id = ".$this->genderId;
		}
		
		if($this->cityId > 0)
		{
			$sql .= " and ct.id = ".$this->cityId;
		}
		
		return $this->executeTable($sql);
	}
	
}