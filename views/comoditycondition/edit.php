<?php

$ccnd= new comoditycondition();
$ccnd->id = $_GET['id'];

$ename= "";
$edescription= "";
$erating= "";

if(isset($_POST['submit']))
{
	$ccnd->fillData();
	
	$er = 0;
	
	if($ccnd->name == "")
	{
		$er++;
		$ename = "Required";
	}
	
	if($ccnd->description == "")
	{
		$er++;
		$edescription= 'Required';
	}
	
	if($ccnd->rating == "")
	{
		$er++;
		$erating= 'Required';
	}
	
	if($er == 0)
	{
		if($ccnd->Update())
		{
			print $html->Success('Condition Updated');
		}
		else{
			print $html->Error($ccnd->error);
		}
	}
	
}
else{
	$ccnd->SelectById();
}

$html->FormBegin();

$html->Text("name", $ccnd->name, $ename);
$html->TextArea("description", $ccnd->description, $edescription);
$html->Text("rating", $ccnd->rating, $erating);

$html->Submit("submit", "Update");
$html->FormEnd();
?>