<?php 

$cap = new comodityapproved();
$cap->id= $_GET['id'];

$ecomodityId= "";
$euserId= "";
$eremarks= "";

if(isset($_POST['submit']))
{
	$cap->fillData();
	
	$er= 0;
	
	if($cap->comodityId == "")
	{
		$er++;
		$ecomodityId= 'Required';
	}
	
	if($cap->userId == "")
	{
		$er++;
		$euserId= 'Required';
	}
	
	if($cap->remarks == "")
	{
		$er++;
		$eremarks= 'Required';
	}
	
	if($er == 0)
	{
		if($cap->Update())
		{
			print $html->Success('Approved Updated');
		}
		else
		{
			print $html->Error($cap->error);
		}
	}
}

else{
	$cap->SelectById();
  }

$html->FormBegin();

$c= new comodity();
$html->Select("userId", $c->Select(), $cap->comodityId, $ecomodityId);

$u= new users();
$html->Select("userId", $u->Select(), $cap->userId, $euserId);

$html->Text("remarks", $cap->remarks, $eremarks);

$html->Submit("submit", "Create");
$html->FormEnd();

?>