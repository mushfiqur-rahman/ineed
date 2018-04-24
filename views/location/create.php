<?php
$lc = new location();


$ename = "";
$ecityid="";

if(isset($_POST['submit']))
{
	$lc->fillData();
	
	$er = 0;
	
	if($lc->name == "")
	{
		$er++;
		$ename = '<span class="error">Required</span>';
	}
	if($lc->cityid == "")
	{
		$er++;
		$ecityid = '<span class="error">Required</span>';
	}
	
	if($er == 0)
	{
		if($lc->Insert())
		{
			print '<span class="success">LOcation Created</span>';
			$lc = new location();
		}
		else{
			print '<span class="error">'.$lc->error.'</span>';
		}
	}
	
}

$html->FormBegin();
$html->Text("name", $lc->name, $ename);
$ct = new city();
$html->Select("cityid", $ct->Select(), $lc->cityid, $ecityid);
$html->Submit("submit", "Create");
$html->FormEnd();

?>