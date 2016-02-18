	<h1>Registreren</h1>
	<form name="RegistratieFormulier" action="" method="post">
		<table>
			<tr>
				<td><label for="Voornaam">Voornaam:</label></td>
				<td><input type="text" id="Voornaam" name="Voornaam" value="<?php echo $Voornaam; ?>"/></td><?php echo $FnameErr; ?>
			</tr>
			<tr>
				<td><label for="Achternaam">Achternaam:</label></td>
				<td><input type="text" id="Achternaam" name="Achternaam" value="<?php echo $Achternaam; ?>" /></td><?php echo $LnameErr; ?>
			</tr>
			<tr>
				<td><label for="Adres">Adres:</label></td>
				<td><input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" /></td>
			</tr>
			<tr>
				<td><label for="Postcode">Postcode:</label></td>
				<td><input type="text" id="Postcode" name="Postcode" value="<?php echo $Postcode; ?>" /></td><?php echo $ZipErr; ?>	
			</tr>
			<tr>
				<td><label for="Woonplaats">Woonplaats:</label></td>
				<td><input type="text" id="Woonplaats" name="Woonplaats" value="<?php echo $Woonplaats; ?>" /></td><?php echo $CityErr;?>
			</tr>
			<tr>
				<td><label for="Telefoon">Telefoon:</label></td>
				<td><input type="text" id="Telefoon" name="Telefoon" value="<?php echo $Telefoon; ?>" /></td><?php echo $TelErr; ?>
			</tr>
			<tr>
				<td><label for="Email">E-mail:</label></td>
				<td><input type="text" id="Email" name="Email" value="<?php echo $Email; ?>" /></td><?php echo $MailErr; ?>
			</tr>
			<tr>
				<td><label for="User">User type:</label></td>
				<td>
				<select name="type" onchange="this.form.submit()">
					<option value="1"<?php if($Type == 1){echo ' selected';} ?>>Lid</option>
					<option value="2"<?php if($Type == 2){echo ' selected';} ?>>Groepsleider</option>
					<option value="3"<?php if($Type == 3){echo ' selected';} ?>>Penningmeester</option>
					<option value="4"<?php if($Type == 4){echo ' selected';} ?>>Administrator</option>
				</select> 
				</td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td><label for="Gebruikersnaam">Gebruikersnaam:</label></td>
				<td><input type="text" id="Gebruikersnaam" name="Gebruikersnaam" value="<?php echo $Gebruikersnaam; ?>" /></td><?php echo $UserErr; ?>
			</tr>
			<tr>
				<td><label for="Wachtwoord">Wachtwoord:</label></td>
				<td><input type="password" id="Wachtwoord" name="Wachtwoord" /></td><?php echo $PassErr; ?>
			</tr>
			<tr>
				<td><label for="Herhaalwachtwoord">Herhaal Paswoord:</label></td>
				<td><input type="password" id="Herhaalwachtwoord" name="Herhaalwachtwoord" /></td><?php echo $RePassErr; ?>
			</tr>
			<tr>	
				<td><input type="submit" name="Registreren" value="Registreer!" /></td>
			</tr>
		<table/>
	</form>