<?php 
$uv = new usersverified();
$uv->id = $_GET['id'];

if (isset($_POST['submit'])) 
{
	$uv->fillData();

	$er  = 0;
	if ($er == 0) {
		if ($uv->Update()) 
		{
		print $html->Success('Update Successful');
		}
		else
		{
			print $html->Error($uv->error);
		}
	}
}
else{
	$uv->SelectById();
}

	$html->FormBegin();

	$u = new users();
	$html->Select("userId", $u->Select(), $uv->userId);
	$html->Text("method", $uv->method);
	$html->Select("adminUserId", $u->Select(), $uv->adminUserId);


	$html->submit("submit", "Update");
	$html->FormEnd();
?>