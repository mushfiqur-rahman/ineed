<h1>Comodityreject Dashboard</h1>
<?php

$html->BlockLink("?controller=comodityreject&view=create", "Create New");

$cr = new comodityreject();

if(isset($_GET['id']))
	print $cr->makeDelete($_GET['id']);

$html->Table($cr->Select(), $controller);



?>