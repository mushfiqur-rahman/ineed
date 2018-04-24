<?php
$ca = new comodityarchive();

$eremarks = "";

if(isset($_POST['submit']))
{
	$ca->fillData();
	
	$er = 0;
	
	if($ca->remarks == "")
	{
		$er++;
		$eremarks = 'Required';
	}
	
	if($er == 0)
	{
		if($ca->Insert())
		{
			print $html->Success('Comodityarchive Created');
			$ca = new comodityarchive();
		}
		else{
			print $html->Error($ca->error);
		}
	}
	
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $ca->comodityId);

$u = new users();
$html->Select("userId", $u->Select(), $ca->userId);

$html->Date("dateTime", $ca->dateTime);

$html->TextArea("remarks", $ca->remarks, $eremarks);
$html->Submit("submit", "Create");
$html->FormEnd();
?>