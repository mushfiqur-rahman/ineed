<?php
$cms = new comoditysold();

$eremarks = "";

if(isset($_POST['submit']))
{
	$cms->fillData();
	
	$er = 0;
	
	if($cms->remarks == "")
	{
		$er++;
		$eremarks = 'Required';
	}
	
	if($er == 0)
	{
		if($cms->Insert())
		{
			print $html->Success('Comoditysold Created');
			$cms = new comoditysold();
		}
		else{
			print $html->Error($cms->error);
		}
	}
	
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cms->comodityId);

$u = new users();
$html->Select("userId", $u->Select(), $cms->userId);

$html->Date("dateTime", $cms->dateTime);

$html->TextArea("remarks", $cms->remarks, $eremarks);
$html->Submit("submit", "Create");
$html->FormEnd();
?>