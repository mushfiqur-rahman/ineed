<h2>Enter your needs</h2>
<?php 

$c= new comodity();
$cPrice = new comodityPrice();
$cLinks = new comodityLinks();
$cImage = new comodityImage();

$etitle= "";

if(isset($_POST['submit']))
{
	$c->fillData();
	$c->ip = $_SERVER['REMOTE_ADDR'];
	$c->userId = $_SESSION['id'];
	
	$cPrice->fillData();
	
	$er= 0;
	
	if($c->title == "")
	{
		$er++;
		$etitle= 'Required';
	}
	
	if($er == 0)
	{
		if($c->Insert())
		{
			$cPrice->comodityId = $c->LastId;
			
			if(!$cPrice->Insert())
				print $html->Error($cPrice->error);
			
			
			$cLinks->comodityId = $c->LastId;
			for($i = 0; $i < count($_POST['Link']); $i++)
			{
				$cLinks->Link = $_POST['Link'][$i];
				$cLinks->title = $_POST['ltitle'][$i];
				if(!$cLinks->Insert())
					print $html->Error($cLinks->error);
			}
			
			$cImage->comodityId = $c->LastId;
			for($i = 0; $i < count($_FILES['image']["name"]); $i++)
			{
				$cImage->image = $_FILES['image']['name'][$i];
				$cImage->title = $_POST['Ititle'][$i];
				if($cImage->Insert())
				{
					$sp = $_FILES['image']['tmp_name'][$i];
					$dp = "uploads/comodityImages/".$cImage->image;
					move_uploaded_file($sp, $dp);
				}
				else{
					print $html->Error($cImage->error);
				}
			}
			
			print $html->Success('Comodity Added');
			$c= new comodity();
			$cPrice = new comodityPrice();
			$cLinks = new comodityLinks();
			$cImage = new comodityImage();
		}
		else
		{
			print $html->Error($c->error);
		}
	}
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

?>

<div class="row container">
	<div class="col-md-3">
		<?php
		$html->Text("regularPrice", $cPrice->regularPrice);
		$html->Text("Price", $cPrice->Price);
		?>
	</div>
	<div id="cLinks" class="col-md-3">
		<div><a href="#" onClick="addLinks()">Add more link</a></div>
		<div id="firstItemLink">
		<?php
		$html->Text("Link[]", $cLinks->Link);
		$html->Text("ltitle[]", $cLinks->title);
		?>
		</div>
	</div>
	
	<div id="cImages" class="col-md-3">
		<div><a href="#" onClick="addImages()">Add more Image</a></div>
		<div id="firstItemImage">
		<?php
		$html->File("image[]");
		$html->Text("Ititle[]", $cImage->title);
		?>
		</div>
	</div>
</div>

<?php

$html->Submit("submit", "Create");
$html->FormEnd();

?>


<script type="text/javascript">
function addLinks()
	{
		document.getElementById('cLinks').innerHTML =  document.getElementById('cLinks').innerHTML + document.getElementById('firstItemLink').innerHTML;
	}
	
	function addImages()
	{
		document.getElementById('cImages').innerHTML =  document.getElementById('cImages').innerHTML + document.getElementById('firstItemImage').innerHTML;
	}
</script>