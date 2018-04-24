<?php
$gnd = new gender();

$ename = "";

if(isset($_POST['submit']))
{
	$gnd->fillData();
	
	$er = 0;
	
	if($gnd->name == "")
	{
		$er++;
		$ename = 'Required';
	}
	
	if($er == 0)
	{
		if($gnd->Insert())
		{
			print $html->Success('Gender Created');
			$gnd = new gender();
		}
		else{
			print $html->Error($gnd->error);
		}
	}
	
}

$html->FormBegin();
$html->Text("name", $gnd->name, $ename);
$html->TextArea("description", $gnd->description);
$html->Submit("submit", "Create");
$html->FormEnd();
?>