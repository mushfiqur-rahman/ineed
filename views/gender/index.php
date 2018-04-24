<h1>Country Dashboard</h1>
<?php

$html->BlockLink("?controller=gender&view=create", "CreateNew");

$gnd = new gender();

if(isset($_GET['id']))
	print $gnd->makeDelete($_GET['id']);

$html->Table($gnd->Select(), $controller);



?>