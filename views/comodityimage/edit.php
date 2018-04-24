<?php
$ci = new comodityimage();
$cl->id = $_GET['id'];

$eimage = "";
$etitle = "";

if(isset($_POST['submit']))
{
	$ci->fillData();
	
	$er = 0;
	
	if($ci->image == "")
	{
		$er++;
		$eimage = 'Required';
	}
	
	if($ci->title == "")
	{
		$er++;
		$etitle = 'Required';
	}
	
	if($er == 0)
	{
		if($ci->Update())
		{
			print '<span class="success">Comodityimage Created</span>';
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
$html->Select("comodityId", $cmd->Select(), $ci->comodityId);

$html->Text("image", $ci->$eimage);

$html->Text("title", $ci->title, $etitle);
$html->Submit("submit", "Update");
$html->FormEnd();
?>