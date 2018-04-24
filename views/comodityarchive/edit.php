<?php
$ca = new comodityarchive();
$ca->id = $_GET['id'];

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
		if($ca->Update())
		{
			print '<span class="success">Comodityarchive Created</span>';
		}
		else{
			print '<span class="error">'.$ca->error.'</span>';
		}
	}
	
}
else{
	$ca->SelectById();
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $ca->comodityId);

$u = new users();
$html->Select("userId", $u->Select(), $ca->userId);

$html->Date("datetime", $ca->datetime);

$html->TextArea("remarks", $ca->remarks, $eremarks);
$html->Submit("submit", "Update");
$html->FormEnd();
?>