<ul id="css3menu1" class="topmenu">
	<li><a href="?controller=public&view=Index">Home</a></li>
	<li><a href="?controller=public&view=i_need_something">I need something</a></li>
	<li><a href="?controller=public&view=comodity">Browse Comodity</a></li>
	
	<li><a href="?controller=public&view=message">Messages</a></li>
	
	<?php
	if(isset($_SESSION['type']))
	{
		print '<li><a href="?controller=account&view=account">'.$_SESSION['name'].'</a></li>';
		print '<li><a href="?controller=account&view=logout">Logout</a></li>';
		if($_SESSION['type'] == "A")
		{
			print '<li><a href="?controller=country">Admin</a></li>';
		}
	}
	else{
		print '<li><a href="?controller=account&view=register">Register</a></li>';
		print '<li><a href="?controller=account&view=login">Login</a></li>';
	}
	?>
	
</ul>