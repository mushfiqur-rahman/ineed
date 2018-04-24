<h1>Priority Dashboard</h1>

<?php

$html->BlockLink("?controller=priority&view=create", "Create New");
$p = new Priority();

if(isset($_GET['id']))
	print $p->makeDelete($_GET['id']);

$html->Table($p->Select(), $controller);

?>