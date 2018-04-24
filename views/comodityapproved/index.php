<h1>Approved Dashboard</h1>

<?php

$html->BlockLink("?controller=comodityapproved&view=create", "Create New");

$cap = new comodityapproved();

if(isset($_GET['id']))
	print $cap->makeDelete($_GET['id']);

$html->Table($cap->Select(), $controller);

?>