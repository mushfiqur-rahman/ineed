<link rel="stylesheet" href="css/comodity.css" />
<?php

$cmd = new comodity();
$a = $cmd->Select();

foreach($a as $item)
{
	print '<div class="comodity">';
	print '<h2>'.$item["name"].'</h2>';
	print '<h3>Posted on : '.$item["dateTime"].' By : '.$item["users"].', Condition : '.$item["condition"].'</h3>';
	
	
	$ci = new comodityimage();
	$ci->comodityId = $item["id"];
	
	$cis = $ci->Select();
	
	print '<a href="?controller=public&view=comodityDetails&id='.$item['id'].'">';
	
	if(count($cis) <= 0)
	{
		print '<img src="images/noproductimage.png"/>';
	}
	
	foreach($cis as $image)
	{
		print '<img src="uploads/comodityImages/'.$image['image'].'" title="'.$image['title'].'"/>';
		break;
	}
	
	print '</a>';
	
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
}