<?php 
$ur = new usersrating();


if (isset($_POST['submit'])) 
{
	$ur->fillData();

	$er  = 0;

	if ($er == 0) {
		if ($ur->Insert())
		{
		print $html->Success('Create Successful');
		$ur = new usersrating();
		}
		else
		{
			print $html->Error($ur->error);
		}
	}
}
  
	$html->FormBegin();

	$u = new users();
	$html->Select("userId", $u->Select(), $ur->userId);
	$html->Select("rateByUserId", $u->Select(), $ur->rateByUserId);
	$html->Text("rating", $ur->rating);


	$html->submit("submit", "Create");
	$html->FormEnd();
?>
	