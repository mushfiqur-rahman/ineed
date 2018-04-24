<?php
$m = new messages();
$m->id = $_GET['id'];

$emessage = "";

if(isset($_POST['submit']))
{
	$m->fillData();
	
	$er = 0;
	
	if($m->message == "")
	{
		$er++;
		$emessage = 'Required';
	}
	
	if($er == 0)
	{
		if($m->Update())
		{
			print '<span class="success">Messages Created</span>';
		}
		else{
			print '<span class="error">'.$m->error.'</span>';
		}
	}
	
}
else{
	$m->SelectById();
}

$html->FormBegin();

$cmc = new comoditycondition();
$html->Select("comodityId", $cmc->Select(), $m->comodityId);

$u = new users();
$html->Select("userId", $u->Select(), $m->userId);

$html->Date("dateTime", $m->dateTime);

$html->TextArea("message", $m->message, $emessage);
$html->Submit("submit", "Update");
$html->FormEnd();
?>