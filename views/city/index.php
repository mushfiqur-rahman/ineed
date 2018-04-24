<h1>City Dashboard</h1>
<?php
$search = "";
$country = "";

if(isset($_POST['btnSearch']))
{
	$search = $_POST['search'];
	$country = $_POST['country'];
}

$html->BlockLink("?controller=city&view=create", "CreateNew");

$html->FormBegin();
$html->Text("search", $search);

$cnt = new country();
$html->Select("country", $cnt->Select(), $country);

$html->Submit("btnSearch", "Search");
$html->FormEnd();

$ct = new city();
$ct->search = $search;
$ct->countryId = $country;

if(isset($_GET['id']))
	print $ct->makeDelete($_GET['id']);


$html->Table($ct->Select(), $controller);



?>