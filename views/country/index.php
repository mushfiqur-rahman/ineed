<h1>Country Dashboard</h1>
<?php

$search = "";

if(isset($_POST['btnSearch']))
{
	$search = $_POST['search'];
}

$html->BlockLink("?controller=country&view=create", "CreateNew");

$html->FormBegin();
$html->Text("search", $search);
$html->Submit("btnSearch", "Search");
$html->FormEnd();

$cnt = new country();
$cnt->search = $search;

if(isset($_GET['id']))
	print $cnt->makeDelete($_GET['id']);

$html->Table($cnt->Select(), $controller);



?>