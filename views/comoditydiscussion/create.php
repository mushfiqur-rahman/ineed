<?php 

$cd = new comoditydiscussion();

$ecomodityId= "";
$euserId= "";
$ecomments= "";

if(isset($_POST['submit']))
{
	$cd->fillData();
	
	$er= 0;
	
	if($cd->comodityId == "")
	{
		$er++;
		$ecomodityId= 'Required';
	}
	
	if($cd->userId == "")
	{
		$er++;
		$euserId= 'Required';
	}
	
	if($cd->comments == "")
	{
		$er++;
		$ecomments= 'Required';
	}
	
	if($er == 0)
	{
		if($cd->Insert())
		{
			print $html->Success('Discussion Added');
			$cd = new comoditydiscussion();
		}
		else
		{
			print $html->Error($cd->error);
		}
	}
}


$html->FormBegin();

$c= new comodity();
$html->Select("comodityId", $c->Select(), $cd->comodityId, $ecomodityId);

$u= new users();
$html->Select("userId", $u->Select(), $cd->userId, $euserId);

$html->TextArea("comments", $cd->comments, $ecomments);

$html->Submit("submit", "Create");
$html->FormEnd();

?>