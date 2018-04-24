<?php
$cp = new comoditypublish();

$eremarks = "";

if(isset($_POST['submit']))
{
	$cp->fillData();
	
	$er = 0;
	
	if($cp->remarks == "")
	{
		$er++;
		$eremarks = 'Required';
	}
	
	if($er == 0)
	{
		if($cp->Insert())
		{
			print $html->Success('Comoditypublish Created');
			$cp = new comoditypublish();
		}
		else{
			print $html->Error($cp->error);
		}
	}
	
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cp->comodityId);

$html->Date("startdate", $cp->startdate);

$html->Date("endDate", $cp->endDate);

$u = new users();
$html->Select("userId", $u->Select(), $cp->userId);

$html->TextArea("remarks", $cp->remarks, $eremarks);
$html->Submit("submit", "Create");
$html->FormEnd();
?>