<h1>Comoditypublish Dashboard</h1>
<?php

$html->BlockLink("?controller=comoditypublish&view=create", "Create New");

$cp = new comoditypublish();

if(isset($_GET['id']))
	print $cp->makeDelete($_GET['id']);

$html->Table($cp->Select(), $controller);



?>