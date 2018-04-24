<h1>UsersRating Dashboard</h1>

<a href="?controller=usersrating&view=create">Create New</a><hr>


<?php 
$ur = new usersrating();

if (isset($_GET['id'])) 
	print $ur->makeDelete($_GET['id']);

$html->Table($ur->Select(), $controller);

 ?>