<?php
if(LoginCheck($pdo) AND $_SESSION['level'] == 4){

	//init fields
	$Voornaam = $Achternaam = $Adres = $Postcode = $Woonplaats = $Telefoon = $Email = $Gebruikersnaam = $Wachtwoord = $RetypeWachtwoord = $Level = $Leeftijd = $Groep = NULL;

	//init error fields
	$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = $LeefErr = NULL;
	if(isset($_POST['type'])){
		$Level = $_POST["type"];
		$Voornaam = $_POST["Voornaam"];
		$Achternaam = $_POST["Achternaam"];
		$Adres = $_POST["Adres"];
		$Postcode = $_POST['Postcode'];
		$Woonplaats = $_POST['Woonplaats'];
		$Telefoon = $_POST['Telefoon'];
		$Email = $_POST['Email'];
		$Gebruikersnaam = $_POST['Gebruikersnaam'];
		$Wachtwoord = $_POST['Wachtwoord'];
		$Herhaalwachtwoord = $_POST['Herhaalwachtwoord'];
		$Leeftijd = @$_POST['Leeftijd'];
		$Groep = @$_POST['Groep'];
	}
	if(isset($_POST['Registreren']))
	{
		$Level = $_POST["type"];
		$Voornaam = $_POST["Voornaam"];
		$Achternaam = $_POST["Achternaam"];
		$Adres = $_POST["Adres"];
		$Postcode = $_POST['Postcode'];
		$Woonplaats = $_POST['Woonplaats'];
		$Telefoon = $_POST['Telefoon'];
		$Email = $_POST['Email'];
		$Gebruikersnaam = $_POST['Gebruikersnaam'];
		$Wachtwoord = $_POST['Wachtwoord'];
		$Herhaalwachtwoord = $_POST['Herhaalwachtwoord'];
		$Leeftijd = @$_POST['Leeftijd'];
		$Groep = @$_POST['Groep'];
		
		$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier


		
		
		//BEGIN CONTROLES

	
		//controleer het voornaam veld
		if(!is_minlength($Voornaam, 2))
		{
		$FnameErr = '<tr class="foutmelding"><td>Voornaam moet uit minimaal 2 tekens bestaan</td></tr>';
		$CheckOnErrors = true;
		}
		if(!is_Char_Only($Voornaam))
		{
		$FnameErr = '<tr class="foutmelding"><td>Alleen letters zijn toegestaan</td></tr>';
		$CheckOnErrors = true;
		}
		//controleer het achternaam veld
		if(!is_minlength($Achternaam, 2))
		{
		$LnameErr = '<tr class="foutmelding"><td>Achternaam moet uit minimaal 2 tekens bestaan</td></tr>';
		$CheckOnErrors = true;
		}
		if(!is_Char_Only($Achternaam))
		{
		$LnameErr = '<tr class="foutmelding"><td>Alleen letters zijn toegestaan</td></tr>';
		$CheckOnErrors = true;
		}
		
		//controleer het postcode veld	
		if(!is_NL_PostalCode($Postcode))
		{
		$ZipErr = '<tr class="foutmelding"><td>Postcode incorrect</td></tr>';
		$CheckOnErrors = true;
		}

		//controleer het plaats veld
		if(!is_Char_Only($Woonplaats))
		{
		$WoonplaatsErr = '<tr class="foutmelding"><td>Alleen letters zijn toegestaan</td></tr>';
		$CheckOnErrors = true;
		}

		//controleer het telnr veld
		if(!is_NL_Telnr($Telefoon))
		{
		$TelErr = '<tr class="foutmelding"><td>Telefoonnummer incorrect</td></tr>';
		$CheckOnErrors = true;
		}
		
		//controleer het email veld
		if(!is_email($Email))
		{
		$MailErr = '<tr class="foutmelding"><td>Email incorrect</td></tr>';
		$CheckOnErrors = true;
		}

		//controleer het username veld
		if(!is_Username_Unique($Gebruikersnaam, $pdo))
		{
		$UserErr = '<tr class="foutmelding"><td>Gebruikersnaam is al in gebruik</td></tr>';
		$CheckOnErrors = true;
		}
		
		//controleer het paswoord veld
		if(!is_minlength($Wachtwoord, 6))
		{
		$PassErr = '<tr class="foutmelding"><td>Wachtwoord moet uit minimaal 6 tekens bestaan</td></tr>';
		$CheckOnErrors = true;
		}
		
		//controleer het retype paswoord veld
		if($Wachtwoord != $Herhaalwachtwoord)
		{
		$RePassErr = '<tr class="foutmelding"><td>Wachtwoord niet hetzelfde</td></tr>';
		$CheckOnErrors = true;
		}
	
		if($CheckOnErrors == true) //aanvullen
		{
		require('./Forms/RegisterForm.php');
		}
		else
		{
			//formulier is succesvol gevalideerd

			//maak unieke salt
			$Salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

			//hash het paswoord met de Salt
			$Wachtwoord = hash('sha512', $Wachtwoord . $Salt);

			
			$parameters = array(':Gebruikersnaam'=>$Gebruikersnaam,
								':Wachtwoord'=>$Wachtwoord,
								':Salt'=>$Salt,
								':Level'=>$Level);
			$sth = $pdo->prepare('INSERT INTO inloggegevens (Gebruikersnaam, Wachtwoord, Salt, Level) VALUES (:Gebruikersnaam, :Wachtwoord, :Salt, :Level)');
			$sth->execute($parameters);
			$LastID = $pdo->lastInsertId();
			
			$parameters2 = array(':PersoonsID'=>$LastID,
								':Voornaam'=>$Voornaam,
								':Achternaam'=>$Achternaam,
								':Adres'=>$Adres,
								':Postcode'=>$Postcode,
								':Woonplaats'=>$Woonplaats,
								':Email'=>$Email,
								':Telefoon'=>$Telefoon);
			$sth = $pdo->prepare('INSERT INTO persoonsgegevens (PersoonsID, Voornaam, Achternaam, Adres, Postcode, Woonplaats, Email, Telefoon) VALUES (:PersoonsID, :Voornaam, :Achternaam, :Adres, :Postcode, :Woonplaats, :Email, :Telefoon)');
			$sth->execute($parameters2);				
			
			if($Level == 1){$tabel = 'leden';}
			elseif($Level == 2){$tabel = 'groepsleiders';}
			
			if($Level < 3)
			{
				$parameters3 = array(':PersoonsID'=>$LastID,
									 ':Leeftijd'=>$Leeftijd,
									 ':GroepID'=>$Groep);
				$sth = $pdo->prepare('INSERT INTO '.$tabel.' (PersoonsID, Leeftijd, GroepID) VALUES (:PersoonsID, :Leeftijd, :GroepID)');
				$sth->execute($parameters3);
			}
			echo 'U heeft succesvol geregistreerd';
			header ('Refresh 3, URL=index.php?Page=10');
			
		}
	}
	else
	{
		require('./Forms/RegisterForm.php');
	}
}
?>




	
