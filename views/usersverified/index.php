<h1>UsersVerified Dashboard</h1>

<a href="?controller=usersverified&view=create">Create New</a><hr>


<?php 
$uv = new usersverified();

if (isset($_GET['id'])) 
	print $uv->makeDelete($_GET['id']);

$html->Table($uv->Select(), $controller);

 ?>