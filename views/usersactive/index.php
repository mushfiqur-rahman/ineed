<h1>UsersActive Dashboard</h1>

<a href="?controller=usersactive&view=create">Create New</a><hr>


<?php 
$ua = new uactive();

if (isset($_GET['id'])) 
	print $ua->makeDelete($_GET['id']);

$html->Table($ua->Select(), $controller);

 ?>