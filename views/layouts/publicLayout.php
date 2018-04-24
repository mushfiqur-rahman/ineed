<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>INeed 37: <?php Title();?></title>
<link rel="stylesheet" href="css/publicLayout.css" />
<link rel="stylesheet" href="css/publicMenu.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>

<div class="header">
	<h1>INeed 37</h1>
	<h2>Admin Panel</h2>
</div>
<div class="main">
	<div class="menu">
		<?php
		include('views/layouts/publicMenu.php');
		?>
	</div>
	<div class="content">
		<?php
		renderBody();
		?>
	</div>
</div>
<div class="footer">
	copyright @adminPanel.com <?php print date('Y');?>
</div>
</body>
</html>