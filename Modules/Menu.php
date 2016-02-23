<div id="menu">
	<a href="?Page=1">
		<div id="logo">
			<img src="./docs/logo.png" height="100%"/>
		</div>
	</a>
	<a href="?Page=1">
		<div class="menu">
			<h1>Home</h1>
		</div>
	</a>
	<a href="?Page=2">
		<div class="menu">
			<h1>Contact</h1>
		</div>
	</a>
	<?php if(LoginCheck($pdo)){ ?>
	
	<a href="?Page=99">
		<div class="inloggen">
			<h1>Uitloggen</h1>
		</div>
	</a>
	
	<?php } else { ?>
	
	<a href="?Page=0">
		<div class="inloggen">
			<h1>Inloggen</h1>
		</div>
	</a>
	
	<?php } ?>
</div>
<div id="secondmenu">
<?php
if(LoginCheck($pdo)){
	$parameters = array(':level'=>$_SESSION['level']);
	$sth = $pdo->prepare("SELECT * FROM menu WHERE Level = :level");
	$sth->execute($parameters);
	
	while($row = $sth->fetch())
	{
	
	echo '<a class ="a_menu" href="?Page='.$row["MenuID"].'">';
		echo '<div class="2ndmenu">';
			echo '<h1>'.$row["Naam"].'</h1>';
		echo '</div>';
	echo '</a>';
	
	}
}
?>
	
</div>