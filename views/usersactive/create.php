<?php 
$ua = new uactive();


if (isset($_POST['submit'])) 
{
	$ua->fillData();

	$er  = 0;

	if ($er == 0) {
		if ($ua->Insert())
		{
		print $html->Success('Create Successful');
		$ua = new uactive();
		}
		else
		{
			print $html->Error($ua->error);
		}
	}
}
  
	$html->FormBegin();

	$u = new users();
	$html->Select("usersId", $u->Select(), $ua->userId);

	$html->Text("ip", $ua->ip);

	$html->submit("submit", "Create");
	$html->FormEnd();
?>
	