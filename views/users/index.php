<h1>Users Dashboard</h1>
<?php

$html->BlockLink("?controller=users&view=create", "Create New");

$u = new users();

if(isset($_GET['id']))
	print $u->makeDelete($_GET['id']);


$html->Table($u->Select(), $controller);



?>