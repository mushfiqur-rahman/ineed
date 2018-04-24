<?php
$cp = new comoditypublish();
$cp->comodityId = $_GET['id'];

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
		if($cp->Update())
		{
			print '<span class="success">Publish Updated</span>';
		}
		else{
			print '<span class="error">'.$cp->error.'</span>';
		}
	}
	
}
else{
	$cp->SelectById();
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cp->comodityId);

$html->Date("startdate", $cp->startdate);

$html->Date("endDate", $cp->endDate);

$u = new users();
$html->Select("userId", $u->Select(), $cp->userId);

$html->TextArea("remarks", $cp->remarks, $eremarks);
$html->Submit("submit", "Update");
$html->FormEnd();
?>