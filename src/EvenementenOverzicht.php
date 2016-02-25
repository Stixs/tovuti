<?php
	$sth = $pdo->prepare("SELECT * FROM evenementen");
	$sth->execute();
	echo '<h2>Evenementen</h2>';
	while($row = $sth->fetch())
	{
	$EvenementID = $row["EvenementID"];
	$Naam = $row["Naam"];
	$Adres = $row["Adres"];
	$Plaats = $row["Plaats"];
	$Datum = $row["Datum"];
	$Tijd = $row['Tijd'];
	$Omschrijving = $row['Omschrijving'];
	$Datum = date('d-m-Y', strtotime($Datum));
	$Tijd = date('H:i', strtotime($Tijd));

		require('./Forms/EventSchedule.php');
	}
?>