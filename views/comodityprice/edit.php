<?php
$cmp = new comodityprice();
$cmp->comodityId = $_GET['id'];

$eregularPrice = "";
$ePrice = "";

if(isset($_POST['submit']))
{
	$cmp->fillData();
	
	$er = 0;
	
	if($cmp->regularPrice == "")
	{
		$er++;
		$eregularPrice = 'Required';
	}
	
	if($cmp->Price == "")
	{
		$er++;
		$ePrice = 'Required';
	}
	
	if($er == 0)
	{
		if($cmp->Update())
		{
			print '<span class="success">Comodityprice Update</span>';
		}
		else{
			print '<span class="error">'.$cmp->error.'</span>';
		}
	}
	
}
else{
	$cmp->SelectById();
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cmp->comodityId);

$html->Text("regularPrice", $cmp->regularPrice);

$html->Text("Price", $cmp->Price, $ePrice);
$html->Submit("submit", "Update");
$html->FormEnd();
?>