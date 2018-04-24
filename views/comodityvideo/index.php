<h1>Comodityvideo Dashboard</h1>
<?php

$html->BlockLink("?controller=comodityvideo&view=create", "Create New");

$cv = new comodityvideo();

if(isset($_GET['id']))
	print $cv->makeDelete($_GET['id']);

$html->Table($cv->Select(), $controller);



?>