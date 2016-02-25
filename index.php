<?php
session_start();
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
			<?php require ('./Modules/Menu.php'); ?>
			<div id="content">
				
					<?php
						if(isset($_GET['Page']))
						{
							$page = $_GET['Page'];
						}
						else
						{
							$page = 1;
						}
						
						switch($page)
						{
							case 0:
							require ('./src/Inloggen.php');
							break;
							case 1:
							require ('./src/Home.php');
							break;
							case 2:
							require ('./src/Contact.php');
							break;
							case 3:
							require ('./src/Profiel.php');
							break;
							case 4:
							require ('./src/MijnGroep.php');
							break;
							case 5:
							require	('./src/Leden.php');
							break;
							case 9:
							require	('./src/Betalen.php');
							break;
							case 10:
							require ('./src/AdminLedenWijzigen.php');
							break;
							case 12:
							require ('./src/Evenementen.php');
							break;
							case 13:
							require ('./src/Registreren.php');
							break;
							case 99:
							require ('./src/Uitloggen.php');
							break;
							default:
							require ('./src/Home.php');
							break;
						}
					?>
				
			</div>
		</div>
	</div>
	</body>
</html>