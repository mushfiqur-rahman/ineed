<?php
$ci = new comodityimage();

$image = array();

$eimage = "";
$etitle = "";

if(isset($_POST['submit']))
{
	$ci->fillData();
	
	$image = $_FILES['image'];
	$ci->image = $image['name'];
	
	
	$er = 0;
	
	if($image['name'] == "")
	{
		$er++;
		$eimage = 'Required';
	}
	
	if($ci->title == "")
	{
		$er++;
		$etitle = 'Required';
	}
	
	if($er == 0)
	{
		
		if($ci->Insert())
		{
			$sp = $image['tmp_name'];
			$dp = "uploads/comodityImages/".$image['name'];
			
			move_uploaded_file($sp, $dp);
			
			print $html->Success('Comodityimage Created');
			$ci = new comodityimage();
		}
		else{
			print $html->Error($ci->error);
		}
	}
	
}

$html->FormBegin("post", "", "enctype=\"multipart/form-data\"");

$cmd = new comodity();
$html->Select("comodityId", $cmd->Select(), $ci->comodityId);

$html->File("image", $eimage);

$html->Text("title", $ci->title, $etitle);
$html->Submit("submit", "Create");
$html->FormEnd();
?>