<h1>Comodityprice Dashboard</h1>
<?php

$html->BlockLink("?controller=comodityprice&view=create", "Create New");

$cmp = new comodityprice();

if(isset($_GET['id']))
	print $cmp->makeDelete($_GET['id']);

$html->Table($cmp->Select(), $controller);



?>