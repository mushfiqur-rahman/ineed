<?php 
$uv = new usersverified();


if (isset($_POST['submit'])) 
{
	$uv->fillData();

	$er  = 0;

	if ($er == 0) {
		if ($uv->Insert())
		{
		print $html->Success('Create Successful');
		$uv = new usersverified();
		}
		else
		{
			print $html->Error($uv->error);
		}
	}
}
  
	$html->FormBegin();

	$u = new users();
	$html->Select("userId", $u->Select(), $uv->userId);
	$html->Text("method", $uv->method);
	$html->Select("adminUserId", $u->Select(), $uv->adminUserId);


	$html->submit("submit", "Create");
	$html->FormEnd();
?>
	