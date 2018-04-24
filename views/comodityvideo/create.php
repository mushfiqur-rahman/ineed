<?php
$cv = new comodityvideo();

$evideoLink = "";
$etitle = "";

if(isset($_POST['submit']))
{
	$cv->fillData();
	
	$er = 0;
	
	if($cv->videoLink == "")
	{
		$er++;
		$evideoLink = 'Required';
	}
	
	if($cv->title == "")
	{
		$er++;
		$etitle = 'Required';
	}
	
	if($er == 0)
	{
		if($cv->Insert())
		{
			print $html->Success('Comodityvideo Created');
			$cv = new comodityvideo();
		}
		else{
			print $html->Error($cl->error);
		}
	}
	
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cv->comodityId);

$html->Text("videoLink", $cv->videoLink, $evideoLink);

$html->Text("title", $cv->title, $etitle);
$html->Submit("submit", "Create");
$html->FormEnd();
?>