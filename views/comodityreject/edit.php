<?php
$cr = new comodityreject();
$cr->comodityId = $_GET['id'];

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
		if($cr->Update())
		{
			print '<span class="success">Comodityreject Created</span>';
		}
		else{
			print '<span class="error">'.$cr->error.'</span>';
		}
	}
	
}
else{
	$cr->SelectById();
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cr->comodityId);

$u = new users();
$html->Select("userId", $u->Select(), $cr->userId);

$html->Date("datetime", $cr->dateTime);

$html->TextArea("remarks", $cr->remarks, $eremarks);
$html->Submit("submit", "Update");
$html->FormEnd();
?>