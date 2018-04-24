<?php
$cnt = new country();

$ename = "";

if(isset($_POST['submit']))
{
	$cnt->fillData();
	
	$er = 0;
	
	if($cnt->name == "")
	{
		$er++;
		$ename = 'Required';
	}
	
	if($er == 0)
	{
		if($cnt->Insert())
		{
			print $html->Success('Country Created');
			$cnt = new country();
		}
		else{
			print $html->Error($cnt->error);
		}
	}
	
}

$html->FormBegin();
$html->Text("name", $cnt->name, $ename);
$html->Submit("submit", "Create");
$html->FormEnd();
?>