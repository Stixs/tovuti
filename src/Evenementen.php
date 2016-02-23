<?php
if(LoginCheck($pdo) AND $_SESSION['level'] == 4){


echo '<a href=?Page=12&event=wijzig>Wijzig</a>';
echo '<a href=?Page=12&event=new>New</a>';

if($_GET['event'] == 'wijzig')
{
	
}
elseif($_GET['event'] == 'new')
{

	//init fields
	$Voornaam = $Achternaam = $Adres = $Postcode = $Woonplaats = $Telefoon = $Email = $Gebruikersnaam = $Wachtwoord = $RetypeWachtwoord = $Level = $Leeftijd = $Groep = NULL;

	//init error fields
	$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = $LeefErr = NULL;
	
	if(isset($_POST['ADD']))
	{
		$Naam = $_POST["Naam"];
		$Adres = $_POST["Adres"];
		$Plaats = $_POST["Plaats"];
		$Datum = $_POST["Datum"];
		$Tijd = $_POST['Tijd'];
		$Omschrijving = $_POST['Woonplaats'];
		
		$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier



		//BEGIN CONTROLES

	/*
		//controleer het naam veld
		if($Naam == null))
		{
		$NaamErr = 'Evenement naam mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Adres == null))
		{
		$AdresErr = 'Adres mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Plaats == null))
		{
		$PlaatsErr = 'Plaats mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Datum == null))
		{
		$DatumErr = 'Datum mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Tijd == null))
		{
		$TijdErr = 'Tijd mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Omschrijving == null))
		{
		$OmsErr = 'Omschrijving mag niet leeg zijn';
		$CheckOnErrors = true;
		}
	*/
		if($CheckOnErrors == true) //aanvullen
		{
		require('./Forms/RegistrerenForm.php');
		}
		else
		{
			//formulier is succesvol gevalideerd

			
			$parameters = array(':Naam'=>$Naam,
								':Adres'=>$Adres,
								':Plaats'=>$Plaats,
								':Datum'=>$Datum,
								':Tijd'=>$Tijd,
								':Omschrijving'=>$Omschrijving);
			$sth = $pdo->prepare('INSERT INTO inloggegevens (Naam, Omschrijving, Adres, Plaats, Datum, Tijd) VALUES (:Naam, :Omschrijving, :Adres, :Plaats, :Datum, :Tijd)');
			$sth->execute($parameters);
			$LastID = $pdo->lastInsertId();
		
			

			echo 'U heeft het evenement aangemaakt';
		}
	}
	else
	{
		require('./Forms/EventForm.php');
	}
}
}
?>




	
