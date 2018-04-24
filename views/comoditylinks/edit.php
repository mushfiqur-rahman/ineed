<?php
$cl = new comoditylinks();
$cl->id = $_GET['id'];

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
		if($cl->Update())
		{
			print '<span class="success">Comoditylinks Created</span>';
		}
		else{
			print '<span class="error">'.$cl->error.'</span>';
		}
	}
	
}
else{
	$cl->SelectById();
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cl->comodityId);

$html->Text("Link", $cl->$eLink);

$html->Text("title", $cl->title, $etitle);
$html->Submit("submit", "Update");
$html->FormEnd();
?>