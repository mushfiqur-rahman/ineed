<?php
$cr = new comodityreject();

$eremarks = "";

if(isset($_POST['submit']))
{
	$cr->fillData();
	
	$er = 0;
	
	if($cr->remarks == "")
	{
		$er++;
		$eremarks = 'Required';
	}
	
	if($er == 0)
	{
		if($cr->Insert())
		{
			print $html->Success('Comodityreject Created');
			$cr = new comodityreject();
		}
		else{
			print $html->Error($cr->error);
		}
	}
	
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cr->comodityId);

$u = new users();
$html->Select("userId", $u->Select(), $cr->userId);

$html->Date("dateTime", $cr->dateTime);

$html->TextArea("remarks", $cr->remarks, $eremarks);
$html->Submit("submit", "Create");
$html->FormEnd();
?>