<?php 
$ub = new usersblock();
$ub->id = $_GET['id'];

if (isset($_POST['submit'])) 
{
	$ub->fillData();

	$er  = 0;
	if ($er == 0) {
		if ($ub->Update()) 
		{
		print $html->Success('Update Successful');
		}
		else
		{
			print $html->Error($ub->error);
		}
	}
}
else{
	$ub->SelectById();
}

	$html->FormBegin();

	$u = new users();
	$html->Select("userId", $u->Select(), $ub->userId);
	$html->Date("dateFrom", $ub->dateFrom);
	$html->Date("dateTo", $ub->dateTo);
	$html->Text("remarks", $ub->remarks);
	// $html->Text("adminUserId", $ub->adminUserId);
	$html->Select("adminUserId", $u->Select(), $ub->adminUserId);


	$html->submit("submit", "Update");
	$html->FormEnd();
?>