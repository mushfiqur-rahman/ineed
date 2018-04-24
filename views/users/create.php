<?php
$u = new users();

$ename = "";
$econtact = "";
$eemail = "";

if(isset($_POST['submit']))
{
	$u->fillData();
	
	$er = 0;
	
	if($u->name == "")
	{
		$er++;
		$ename = '<span class="error">Required</span>';
	}
	if($u->contact == "")
	{
		$er++;
		$econtact = '<span class="error">Required</span>';
	}
	if($u->email == "")
	{
		$er++;
		$eemail = '<span class="error">Required</span>';
	}
	
	if($er == 0)
	{
		if($u->Insert())
		{
			print '<span class="success">Users Created</span>';
			$u = new users();
		}
		else{
			print '<span class="error">'.$u->error.'</span>';
		}
	}
	
}

$html->FormBegin();
$html->Text("name", $u->name, $ename);
$html->Text("contact", $u->contact, $econtact);
$html->Text("email", $u->email, $eemail);
$html->Password("password", $u->password);
$html->Date("dob", $u->dob);

$gn = new gender();
$html->Select("genderId", $gn->Select(), $u->genderId);

$html->TextArea("address", $u->address);

$ct = new city();
$html->Select("cityId", $ct->Select(), $u->cityId);

$html->Text("image", $u->image);
$html->Text("type", $u->type);
$html->Text("createDate", $u->createDate);
$html->Text("createIp", $u->createIp);


$html->Submit("submit", "Create");
$html->FormEnd();
?>