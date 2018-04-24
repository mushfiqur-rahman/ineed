<link rel="stylesheet" href="css/comodity.css" />


<script type="text/javascript">

	function changeImage(id)
	{
		document.getElementById('mainImage').setAttribute("src", document.getElementById(id).getAttribute("src"));
		document.getElementById('mainImage').setAttribute("class", "mainImage");
		document.getElementById('mainImage').setAttribute("class", "mainImageAnim");
	}
	
</script>

<?php

$cmd = new comodity();
$cmd->id = $_GET['id'];
$a = $cmd->Select();

foreach($a as $item)
{
	print '<div class="comodityDetails">';
	print '<h2>'.$item["name"].'</h2>';
	print '<h3>Posted on : '.$item["dateTime"].' By : '.$item["users"].', Condition : '.$item["condition"].'</h3>';
	
	
	$ci = new comodityimage();
	$ci->comodityId = $item["id"];
	
	$cis = $ci->Select();
	
	//if(count($cis) <= 0)
	//{
		//print '<img src="images/noproductimage.png"/>';
	//}
	
	
	
	//main div
	print '<div class="container row">';
	
	//left element
	print '<div class="col-md-6">';
	$i = 0;
	foreach($cis as $image)
	{
		if($i == 0)
		{
			print '<img id="mainImage" src="uploads/comodityImages/'.$image['image'].'" title="'.$image['title'].'"/>';
		}
		print '<img id="subImage'.$i.'" class="subImage" onClick="changeImage(\'subImage'.$i.'\');"  src="uploads/comodityImages/'.$image['image'].'" title="'.$image['title'].'"/>';
		$i++;
	}
	print '</div>';
	
	//right element
	
	print '<div class="col-md-6">';
	$cp = new comodityprice();
	$cp->comodityId = $item["id"];
	
	$cps = $cp->Select();
	
	print '<span>Regular Price : '.$cps[0]["regularPrice"].' now : '.$cps[0]["price"].'</span>';
	
	
	
	
	print '<p>'.$item["description"].'</p>';
	
	print '<div>';
	$msg = new messages();
	$msg->comodityId = $item["id"];
	
	$msgs = $msg->Select();
	
	print 'Message :'.count($msgs).' | <a href="?controller=public&view=message&comodity='.$item['id'].'">Send Message</a><br />';
	
	$ur = new usersrating();
	$ur->userId = $item["userId"];
	$urs = $ur->Select();
	
	$sum = 0;
	foreach($urs as $rating)
	{
		$sum += $rating["rating"];
	}
	
	print "User Rating : ". $sum / count($urs) ."/10 of ".count($urs)."<br />";
	
	print '</div>';
	
	
	print '</div>';
	
	print '</div>';
}