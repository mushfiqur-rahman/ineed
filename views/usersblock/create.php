<?php 
$ub = new usersblock();


if (isset($_POST['submit'])) 
{
	$ub->fillData();

	$er  = 0;

	if ($er == 0) {
		if ($ub->Insert())
		{
		print $html->Success('Create Successful');
		$ub = new usersblock();
		}
		else
		{
			print $html->Error($ub->error);
		}
	}
}
  
	$html->FormBegin();

	$u = new users();
	$html->Select("userId", $u->Select(), $ub->userId);
	$html->Date("dateFrom", $ub->dateFrom);
	$html->Date("dateTo", $ub->dateTo);
	$html->Text("remarks", $ub->remarks);
	// $html->Text("adminUserId", $ub->adminUserId);
	$html->Select("adminUserId", $u->Select(), $ub->adminUserId);


	$html->submit("submit", "Create");
	$html->FormEnd();
?>
	