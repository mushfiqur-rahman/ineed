<ul id="css3menu1" class="topmenu">
	<li><a href="?controller=home">Home</a></li>
	<li><a href="#">Users</a>
		<ul>
			<li><a href="?controller=users">Users</a></li>
			<li><a href="?controller=loginhistory">Loginhistory</a></li>
			<li><a href="?controller=usersactive">Active</a></li>
			<li><a href="?controller=usersblock">Block</a></li>
			<li><a href="?controller=usersrating">Rating</a></li>
			<li><a href="?controller=usersverified">Verified</a></li>
		</ul>
	</li>
	<li><a href="#">Reference</a>
		<ul>
			<li><a href="?controller=country">Country</a></li>
			<li><a href="?controller=city">City</a></li>
			<li><a href="?controller=location">Location</a></li>
			<li><a href="?controller=gender">Gender</a></li>
		</ul>
	</li>
	
	<li><a href="#">Comodity</a>
		<ul>
			<li><a href="?controller=priority">Priority</a></li>
			<li><a href="?controller=comoditycondition">Condition</a></li>
			<li><a href="?controller=comodity">Comodity</a></li>
			<li><a href="?controller=comodityapproved">Approved</a></li>
			<li><a href="?controller=comodityimage">Image</a></li>
			<li><a href="?controller=comoditylinks">Links</a></li>
			<li><a href="?controller=comodityprice">Price</a></li>
			<li><a href="?controller=comoditypublish">Publish</a></li>
			<li><a href="?controller=comodityreject">Reject</a></li>
			<li><a href="?controller=comoditysold">Sold</a></li>
			<li><a href="?controller=comodityvideo">Video</a></li>
			<li><a href="?controller=comoditydiscussion">Discussion</a></li>
			<li><a href="?controller=comodityarchive">Archive</a></li>
		</ul>
	</li>
	<li><a href="?controller=messages">Messages</a></li>
	
	<?php
	if(isset($_SESSION['type']) && $_SESSION['type'] == "A")
	{
		print '<li><a href="?controller=MyAccount">'.$_SESSION['name'].'</a></li>';
		print '<li><a href="?controller=MyAccount&view=logout">Logout</a></li>';
	}
	else{
		///print '<li><a href="?controller=MyAccount&view=register">Register</a></li>';
		print '<li><a href="?controller=MyAccount&view=login">Login</a></li>';
	}
	?>
	
</ul>