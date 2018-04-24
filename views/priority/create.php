<?php 

$p= new priority();

$ename= "";

if(isset($_POST['submit']))
{
	$p->fillData();
	
	$er= 0;
	
	if($p->name == "")
	{
		$er++;
		$ename= 'Required';
	}
	
	if($er == 0)
	{
		if($p->Insert())
		{
			print 'Priority Added';
			$p= new priority();
		}
		else
		{
			print $html->Error($p->error);
		}
	}
}


$html->FormBegin();
$html->Text("name", $p->name, $ename);
$html->TextArea("description", $p->description);

$html->Submit("submit", "Create");
$html->FormEnd();

?>