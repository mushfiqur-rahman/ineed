<?php 

$cap = new comodityapproved();

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
		if($cap->Insert())
		{
			print $html->Success('Approved Added');
			$cap = new comodityapproved();
		}
		else
		{
			print $html->Error($cap->error);
		}
	}
}


$html->FormBegin();

$c= new comodity();
$html->Select("comodityId", $c->Select(), $cap->comodityId, $ecomodityId);

$u= new users();
$html->Select("userId", $u->Select(), $cap->userId, $euserId);

$html->TextArea("remarks", $cap->remarks, $eremarks);

$html->Submit("submit", "Create");
$html->FormEnd();

?>