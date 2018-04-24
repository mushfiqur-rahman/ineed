<?php
$ct = new city();

$ename = "";
$ecountryId = "";

if(isset($_POST['submit']))
{
	$ct->fillData();
	
	$er = 0;
	
	if($ct->name == "")
	{
		$er++;
		$ename = '<span class="error">Required</span>';
	}
	if($ct->countryId == "")
	{
		$er++;
		$ecountryId = '<span class="error">Required</span>';
	}
	
	if($er == 0)
	{
		if($ct->Insert())
		{
			print '<span class="success">City Created</span>';
			$ct = new city();
		}
		else{
			print '<span class="error">'.$ct->error.'</span>';
		}
	}
	
}

$html->FormBegin();
$html->Text("name", $ct->name, $ename);

$cn = new country();
$html->Select("countryId", $cn->Select(), $ct->countryId, $ecountryId);
$html->Submit("submit", "Create");
$html->FormEnd();
?>