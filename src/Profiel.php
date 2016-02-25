<?php
if(LoginCheck($pdo) AND $_SESSION['level'] == 1){

	//init fields
	$Voornaam = $Achternaam = $Adres = $Postcode = $Woonplaats = $Telefoon = $Email = $Gebruikersnaam = $Wachtwoord = $RetypeWachtwoord = $Level = $Leeftijd = $Groep = NULL;

	//init error fields
	$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = $LeefErr = NULL;
	
	if(isset($_POST['Wijzig']))
	{
		$row = $sth->fetch();
		
		$Voornaam = $_POST['Voornaam'];
		$Achternaam = $_POST['Achternaam'];
		$Adres = $_POST['Adres'];
		$Postcode = $_POST['Postcode'];
		$Woonplaats = $_POST['Woonplaats'];
		$Telefoon = $_POST['Telefoon'];
		$Email = $_POST['Email'];
		
		$Betaalmethode = $_POST['Betaalmethode'];
		
		$Gebruikersnaam = $_POST['Gebruikersnaam'];
		
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
		
		$Betaalmethode = $row['Betaalmethode'];
		
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
		
		$Gebruikersnaam = $row['Gebruikersnaam'];
		
		require('./Forms/ProfielForm.php');
	}
}
?>