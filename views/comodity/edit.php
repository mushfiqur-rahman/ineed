<?php 

$c= new comodity();
$c->id= $_GET['id'];

$etitle= "";

if(isset($_POST['submit']))
{
	$c->fillData();
	
	$er= 0;
	
	if($c->title == "")
	{
		$er++;
		$etitle= 'Required';
	}
	
	if($er == 0)
	{
		if($c->Update())
		{
			print $html->Success('Comodity Updated');
			$c= new comodity();
		}
		else
		{
			print $html->Error($c->error);
		}
	}
}

else{
	$c->SelectById();
  }

		$html->FormBegin();
		$html->Text("title", $c->title, $etitle);
		$html->TextArea("description", $c->description);

		$ccnd= new comoditycondition();
		$html->Select("conditionId", $ccnd->Select(), $c->conditionId);

		$l= new location();
		$html->Select("locationId", $l->Select(), $c->locationId);

		$p= new priority();
		$html->Select("priorityId", $p->Select(), $c->priorityId);

		$u= new users();
		$html->Select("userId", $u->Select(), $c->userId);

		$html->Text("ip", $c->ip);

		$html->Submit("submit", "Update");
		$html->FormEnd();
?>