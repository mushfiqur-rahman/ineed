<?php 
$ua = new uactive();
$ua->id = $_GET['id'];


if (isset($_POST['submit'])) 
{
	$ua->fillData();

	$er  = 0;

	if ($er == 0) {
		if ($ua->Update())
		{
		print $html->Success('Update Successful');
		}
		else
		{
			print $html->Error($ua->error);
		}
	}
}
else{
	$ua->SelectById();
}

	$html->FormBegin();

	$u = new users();
	$html->Select("usersId", $u->Select(), $ua->userId);

	$html->Text("ip", $ua->ip);

	$html->submit("submit", "Update");
	$html->FormEnd();
?>
