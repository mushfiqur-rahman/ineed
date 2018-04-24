<h1>Location Dashboard</h1>
<?php

$html->BlockLink("?controller=location&view=create", "Create New");

$l = new location();

if(isset($_GET['id']))
	print $l->makeDelete($_GET['id']);


$html->Table($l->Select(), $controller);



?> 