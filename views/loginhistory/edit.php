<?php 

$lgh= new loginhistory();
$lgh->userId= $_GET['id'];

$euserId= "";
$eip= "";

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
		if($lgh->Update())
		{
			print $html->Success('History Updated');
		}
		else
		{
			print $html->Error($lgh->error);
		}
	}
}

else{
	$lgh->SelectById();
  }


$html->FormBegin();

$html->Text("ip", $lgh->ip, $eip);

$u= new users();
$html->Select("userId", $u->Select(), $lgh->userId, $euserId);

$html->Submit("submit", "Update");
$html->FormEnd();

?>