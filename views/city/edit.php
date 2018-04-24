<?php
$ct = new city();
$ct->id = $_GET['id'];

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
		if($ct->Update())
		{
			print '<span class="success">City Updated</span>';
		}
		else{
			print '<span class="error">'.$ct->error.'</span>';
		}
	}
	
}
else{
	$ct->SelectById();
}

$html->FormBegin();
$html->Text("name", $ct->name, $ename);

$sql = "select id, name from country";
$table = mysqli_query($cn, $sql);

$html->Select("countryId", $table, $ct->countryId, $ecountryId);
$html->Submit("submit", "Update");
$html->FormEnd();
?>