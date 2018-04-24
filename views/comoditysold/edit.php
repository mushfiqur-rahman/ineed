<?php
$cms= new comoditysold();
$cms->id = $_GET['id'];

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
		if($cms->Update())
		{
			print '<span class="success">Comoditysold Created</span>';
		}
		else{
			print '<span class="error">'.$cms->error.'</span>';
		}
	}
	
}
else{
	$cms->SelectById();
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cms->comodityId);

$u = new users();
$html->Select("userId", $u->Select(), $cms->userId);

$html->Date("datetime", $cms->datetime);

$html->TextArea("remarks", $cms->remarks, $eremarks);
$html->Submit("submit", "Update");
$html->FormEnd();
?>