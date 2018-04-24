<h1>Loginhistory Dashboard</h1>

<?php

$html->BlockLink("?controller=loginhistory&view=create", "Create New");

$lgh = new loginhistory();

if(isset($_GET['id']))
	print $lgh->makeDelete($_GET['id']);

$html->Table($lgh->Select(), $controller);

?>