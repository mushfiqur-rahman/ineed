<?php
$cmp = new comodityprice();

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
		if($cmp->Insert())
		{
			print $html->Success('Comodityprice Created');
			$cmp = new comodityprice();
		}
		else{
			print $html->Error($cmp->error);
		}
	}
	
}

$html->FormBegin();

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $cmp->comodityId);

$html->Text("regularPrice", $cmp->regularPrice, $eregularPrice);

$html->Text("Price", $cmp->Price, $ePrice);
$html->Submit("submit", "Create");
$html->FormEnd();
?>