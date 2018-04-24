<h1>Comodityimage Dashboard</h1>
<?php

$html->BlockLink("?controller=comodityimage&view=create", "Create New");

$ci = new comodityimage();

if(isset($_GET['id']))
	print $ci->makeDelete($_GET['id']);

$html->Table($ci->Select(), $controller, "image", "<img src=\"uploads/comodityImages/#replace#\"/>");



?>