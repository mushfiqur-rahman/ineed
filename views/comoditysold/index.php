<h1>Comoditysold Dashboard</h1>
<?php

$html->BlockLink("?controller=comoditysold&view=create", "Create New");

$cms = new comoditysold();

if(isset($_GET['id']))
	print $cms->makeDelete($_GET['id']);

$html->Table($cms->Select(), $controller);



?>