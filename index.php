<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>FC Iorn</title>
	</head>
	<body>
	<div id="site">
		<div id="page">
			<div id="menu">
				<a href="?Page=0">
					<div id="logo">
						<h1>[Logo]</h1>
					</div>
				</a>
				<a href="?Page=0">
					<div class="menu">
						<h1>Home</h1>
					</div>
				</a>
				<a href="?Page=1">
					<div class="menu">
						<h1>Contact</h1>
					</div>
				</a>
				<a href="?Page=2">
					<div class="inloggen">
						<h1>Inloggen</h1>
					</div>
				</a>
			</div>
			<div id="content">
				<div id="switch">
					<?php
						if(isset($_GET['Page']))
						{
							$page = $_GET['Page'];
						}
						else
						{
							$page = 0;
						}
						
						switch($page)
						{
							case 0:
							require ('./src/Home.php');
							break;
							case 1:
							require ('./src/Contact.php');
							break;
							case 2:
							require ('./src/inloggon.php');
							break;
							default:
							require ('./');
							break;
						}
					?>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>