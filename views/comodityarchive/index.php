<h1>Comodityarchive Dashboard</h1>
<?php

$html->BlockLink("?controller=comodityarchive&view=create", "Create New");

$ca = new comodityarchive();

if(isset($_GET['id']))
	print $ca->makeDelete($_GET['id']);

$html->Table($ca->Select(), $controller);



?>