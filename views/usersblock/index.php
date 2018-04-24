<h1>UsersBlock Dashboard</h1>

<a href="?controller=usersblock&view=create">Create New</a><hr>


<?php 
$ub = new usersblock();

if (isset($_GET['id'])) 
	print $ub->makeDelete($_GET['id']);

$html->Table($ub->Select(), $controller);

 ?>