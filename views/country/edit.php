<?php
$cnt = new country();
$cnt->id = $_GET['id'];

$ename = "";

if(isset($_POST['submit']))
{
	$cnt->fillData();
	
	$er = 0;
	
	if($cnt->name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($er == 0)
	{
		if($cnt->Update())
		{
			print $html->Success('Country Updated');
		}
		else{
			print $html->Error($cnt->error);
		}
	}
	
}
else{
	$cnt->SelectById();
}

$html->FormBegin();
$html->Text("name", $cnt->name, $ename);
$html->Submit("submit", "Update");
$html->FormEnd();
?>