<h1>Comodity Dashboard</h1>

<?php

$html->BlockLink("?controller=comodity&view=create", "Create New");

$c = new comodity();


if(isset($_GET['id']))
	print $c->makeDelete($_GET['id']);

$html->Table($c->Select(), $controller);

?>