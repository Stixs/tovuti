	<h1>Registreren</h1>
	<form name="RegistratieFormulier" action="" method="post">
		<label for="Voornaam">Voornaam:</label>
		<input type="text" id="Voornaam" name="Voornaam" value="<?php echo $Voornaam; ?>"/><?php echo $FnameErr; ?>
		<br />
		<label for="Achternaam">Achternaam:</label>
		<input type="text" id="Achternaam" name="Achternaam" value="<?php echo $Achternaam; ?>" /><?php echo $LnameErr; ?>
		<br />		
		<label for="Adres">Adres:</label>
		<input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" />
		<br />
		<label for="Postcode">Postcode:</label>
		<input type="text" id="Postcode" name="Postcode" value="<?php echo $Postcode; ?>" /><?php echo $ZipErr; ?>
		<br />		
		<label for="Woonplaats">Woonplaats:</label>
		<input type="text" id="Woonplaats" name="Woonplaats" value="<?php echo $Woonplaats; ?>" /><?php echo $CityErr;?>
		<br />
		<label for="Telefoon">Telefoon:</label>
		<input type="text" id="Telefoon" name="Telefoon" value="<?php echo $Telefoon; ?>" /><?php echo $TelErr; ?>
		<br />
		<label for="Email">E-mail:</label>
		<input type="text" id="Email" name="Email" value="<?php echo $Email; ?>" /><?php echo $MailErr; ?>
		<br />
		<br />
		<label for="Gebruikersnaam">Gebruikersnaam:</label>
		<input type="text" id="Gebruikersnaam" name="Gebruikersnaam" value="<?php echo $Gebruikersnaam; ?>" /><?php echo $UserErr; ?>
		<br />		
		<label for="Wachtwoord">Wachtwoord:</label>
		<input type="password" id="Wachtwoord" name="Wachtwoord" /><?php echo $PassErr; ?>
		<br />		
		<label for="Herhaalwachtwoord">Herhaal Paswoord:</label>
		<input type="password" id="Herhaalwachtwoord" name="Herhaalwachtwoord" /><?php echo $RePassErr; ?>
		<br />		
		<input type="submit" name="Registreren" value="Registreer!" />
	</form>