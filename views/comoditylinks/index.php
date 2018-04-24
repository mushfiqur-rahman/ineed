<h1>Comoditylinks Dashboard</h1>
<?php

$html->BlockLink("?controller=comoditylinks&view=create", "Create New");

$cl = new comoditylinks();

if(isset($_GET['id']))
	print $cl->makeDelete($_GET['id']);

$html->Table($cl->Select(), $controller);



?>