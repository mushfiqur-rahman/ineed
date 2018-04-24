<?php 

$ccnd= new comoditycondition();

$ename= "";
$edescription= "";
$erating= "";

if(isset($_POST['submit']))
{
	$ccnd->fillData();
	
	$er= 0;
	
	if($ccnd->name == "")
	{
		$er++;
		$ename= 'Required';
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
		if($ccnd->Insert())
		{
			print 'Condtion Added';
			$ccnd= new comoditycondition();
		}
		else
		{
			print $html->Error($ccnd->error);
		}
	}
}


$html->FormBegin();

$html->Text("name", $ccnd->name, $ename);
$html->TextArea("description", $ccnd->description, $edescription);
$html->Text("rating", $ccnd->rating, $erating);

$html->Submit("submit", "Create");
$html->FormEnd();

?>