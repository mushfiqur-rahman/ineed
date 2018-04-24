<h1>Condtion Dashboard</h1>

<?php

$html->BlockLink("?controller=comoditycondition&view=create", "Create New");
$ccnd = new comoditycondition();

if(isset($_GET['id']))
	print $ccnd->makeDelete($_GET['id']);

$html->Table($ccnd->Select(), $controller);

?>