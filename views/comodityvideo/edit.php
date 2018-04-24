<?php
$cv = new comodityvideo();
$cv->id = $_GET['id'];

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
		if($cv->Update())
		{
			print '<span class="success">Comodityvideo Created</span>';
		}
		else{
			print '<span class="error">'.$cv->error.'</span>';
		}
	}
	
}
else{
	$cv->SelectById();
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cv->comodityId);

$html->Text("videoLink", $cv->videoLink, $evideoLink);

$html->Text("title", $cv->title, $etitle);
$html->Submit("submit", "Update");
$html->FormEnd();
?>