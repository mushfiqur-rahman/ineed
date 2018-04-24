<h1>Discussion Dashboard</h1>

<?php

$html->BlockLink("?controller=comoditydiscussion&view=create", "Create New");

$cd = new comoditydiscussion();

if(isset($_GET['id']))
	print $cd->makeDelete($_GET['id']);

$html->Table($cd->Select(), $controller);

?>