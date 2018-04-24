<?php 

$lgh= new loginhistory();

$euserId= "";
$eip = "";

if(isset($_POST['submit']))
{
	$lgh->fillData();
	
	$er= 0;
	
	if($lgh->userId == "")
	{
		$er++;
		$euserId= 'Required';
	}
	
	if($lgh->ip == "")
	{
		$er++;
		$eip= 'Required';
	}
	
	if($er == 0)
	{
		if($lgh->Insert())
		{
			print $html->Success('History Added');
			$lgh= new loginhistory();
		}
		else
		{
			print $html->Error($lgh->error);
		}
	}
}


$html->FormBegin();

$html->Text("ip", $lgh->ip, $eip);

$u= new users();
$html->Select("userId", $u->Select(), $lgh->userId, $euserId);

$html->Submit("submit", "Create");
$html->FormEnd();

?>