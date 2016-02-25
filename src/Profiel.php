<?php
if(LoginCheck($pdo) AND $_SESSION['level'] == 1){

	//init fields
	$Voornaam = $Achternaam = $Adres = $Postcode = $Woonplaats = $Telefoon = $Email = $Gebruikersnaam = $oudWachtwoord = $nieuwWachtwoord = $herhaalWachtwoord = $Level = $Leeftijd = $Groep = NULL;

	//init error fields
	$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = $LeefErr = NULL;
	
	if(isset($_POST['Wijzig']))
	{
		
		$Voornaam = $_POST['Voornaam'];
		$Achternaam = $_POST['Achternaam'];
		$Adres = $_POST['Adres'];
		$Postcode = $_POST['Postcode'];
		$Woonplaats = $_POST['Woonplaats'];
		$Telefoon = $_POST['Telefoon'];
		$Email = $_POST['Email'];

		$Gebruikersnaam = $_POST['Gebruikersnaam'];

		
		$parameters = array(':PersoonsID'=>$_SESSION['user_id'],
							':Voornaam'=>$Voornaam,
							':Achternaam'=>$Achternaam,
							':Adres'=>$Adres,
							':Postcode'=>$Postcode,
							':Woonplaats'=>$Woonplaats,
							':Telefoon'=>$Telefoon,
							':Email'=>$Email);
		$sth = $pdo->prepare('UPDATE persoonsgegevens SET Achternaam = :Achternaam, Voornaam = :Voornaam, Adres = :Adres, Postcode = :Postcode, Woonplaats = :Woonplaats, Telefoon = :Telefoon, Email = :Email WHERE PersoonsID = :PersoonsID');
		$sth->execute($parameters);
		
		
		require('./Forms/EditProfielForm.php');
	}
	elseif(isset($_POST['wijzigprofiel']))
	{
		$sth = $pdo->prepare("SELECT * FROM persoonsgegevens p, leden l, inloggegevens i WHERE p.PersoonsID = l.PersoonsID AND p.PersoonsID = i.PersoonsID");
		$sth->execute();
		
		$row = $sth->fetch();
		
		$Voornaam = $row['Voornaam'];
		$Achternaam = $row['Achternaam'];
		$Adres = $row['Adres'];
		$Postcode = $row['Postcode'];
		$Woonplaats = $row['Woonplaats'];
		$Telefoon = $row['Telefoon'];
		$Email = $row['Email'];
		
		$Gebruikersnaam = $row['Gebruikersnaam'];
		
		require('./Forms/EditProfielForm.php');
	}
	else
	{
		$sth = $pdo->prepare("SELECT * FROM persoonsgegevens p, leden l, inloggegevens i, groep g WHERE p.PersoonsID = l.PersoonsID AND p.PersoonsID = i.PersoonsID AND g.GroepID = l.GroepID");
		$sth->execute();
		
		$row = $sth->fetch();
		
		$Voornaam = $row['Voornaam'];
		$Achternaam = $row['Achternaam'];
		$Adres = $row['Adres'];
		$Postcode = $row['Postcode'];
		$Woonplaats = $row['Woonplaats'];
		$Telefoon = $row['Telefoon'];
		$Email = $row['Email'];
		
		$Groep = $row['Groepnaam'];
		$Leeftijd = $row['Leeftijd'];
		
		$Betaalmethode = $row['Betaalmethode'];
		$Betaalstatus = $row['Betaalstatus'];
		
		$Gebruikersnaam = $row['Gebruikersnaam'];
		
		require('./Forms/ProfielForm.php');
	}
}
?>