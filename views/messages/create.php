<?php
$m = new messages();

$emessage = "";

if(isset($_POST['submit']))
{
	$m->fillData();
	
	$er = 0;
	
	if($cmd->message == "")
	{
		$er++;
		$emessage = 'Required';
	}
	
	if($er == 0)
	{
		if($m->Insert())
		{
			print $html->Success('Messages Created');
			$m = new messages();
		}
		else{
			print $html->Error($m->error);
		}
	}
	
}

$html->FormBegin();

$cmc = new comoditycondition();
$html->Select("comodityId", $cmc->Select(), $m->comodityId);

$u = new users();
$html->Select("userId", $u->Select(), $m->userId);

$html->Date("dateTime", $m->dateTime);

$html->TextArea("message", $m->message, $emessage);
$html->Submit("submit", "Create");
$html->FormEnd();
?>