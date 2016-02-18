<?php
require ('./Modules/functies.php');
$pdo = ConnectDB();
?>

<!DOCTYPE html>

<html>
	<head>
		<link href="./docs/icon.ico" type="icon/x-icon" rel="icon">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>FC Iorn</title>
	</head>
	<body>
	<div id="site">
		<div id="page">
			<div id="menu">
				<a href="?Page=0">
					<div id="logo">
						<img src="./docs/logo.png" height="100%"/>
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
							require ('./src/Inloggen.php');
							break;
							case 3:
							require ('./src/Registreren.php');
							break;
							case 4:
							require	('./src/Leden.php');
							break;
							default:
							require ('./');
							break;
						}
					?>
				
			</div>
		</div>
	</div>
	</body>
</html>