<?php
$cl = new comoditylinks();

$eLink = "";
$etitle = "";

if(isset($_POST['submit']))
{
	$cl->fillData();
	
	$er = 0;
	
	if($cl->Link == "")
	{
		$er++;
		$eLink = 'Required';
	}
	
	if($cl->title == "")
	{
		$er++;
		$etitle = 'Required';
	}
	
	if($er == 0)
	{
		if($cl->Insert())
		{
			print $html->Success('Comoditylinks Created');
			$cl = new comoditylinks();
		}
		else{
			print $html->Error($cl->error);
		}
	}
	
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cl->comodityId);

$html->Text("Link", $cl->Link, $eLink);

$html->Text("title", $cl->title, $etitle);
$html->Submit("submit", "Create");
$html->FormEnd();
?>