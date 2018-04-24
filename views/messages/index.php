<h1>Messages Dashboard</h1>
<?php

$html->BlockLink("?controller=messages&view=create", "Create New");

$m = new messages();

if(isset($_GET['id']))
	print $m->makeDelete($_GET['id']);

$html->Table($m->Select(), $controller);



?>