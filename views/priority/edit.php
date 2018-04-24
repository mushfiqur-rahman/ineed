<?php
$p = new priority();
$p->id = $_GET['id'];

$ename = "";

if(isset($_POST['submit']))
{
	$p->fillData();
	
	$er = 0;
	
	if($p->name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($er == 0)
	{
		if($p->Update())
		{
			print $html->Success('Priority Updated');
		}
		else{
			print $html->Error($p->error);
		}
	}
	
}
else{
	$p->SelectById();
}

$html->FormBegin();

$html->Text("name", $p->name, $ename);
$html->TextArea("description", $p->description);

$html->Submit("submit", "Update");
$html->FormEnd();
?>