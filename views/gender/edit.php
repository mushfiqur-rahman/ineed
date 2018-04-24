<?php
$gnd = new gender();
$gnd->id = $_GET['id'];

$ename = "";

if(isset($_POST['submit']))
{
	$gnd->fillData();
	
	$er = 0;
	
	if($gnd->name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($er == 0)
	{
		if($gnd->Update())
		{
			print $html->Success('Gender Updated');
		}
		else{
			print $html->Error($gnd->error);
		}
	}
	
}
else{
	$gnd->SelectById();
}

$html->FormBegin();
$html->Text("name", $gnd->name, $ename);
$html->TextArea("description", $gnd->description);
$html->Submit("submit", "Update");
$html->FormEnd();
?>