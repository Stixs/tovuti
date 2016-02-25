<div class="row registreren">
	<div class="col-1"></div>
	<div class="col-10">
		<h1>Registreren</h1>
		<form name="RegistratieFormulier" action="" method="post">
			<table>
				<tr>
					<td><label for="Voornaam">Voornaam:</label></td>
					<td><input type="text" id="Voornaam" name="Voornaam" value="<?php echo $Voornaam; ?>" required /></td>
				</tr>
				<?php echo $FnameErr; ?>
				<tr>
					<td><label for="Achternaam">Achternaam:</label></td>
					<td><input type="text" id="Achternaam" name="Achternaam" value="<?php echo $Achternaam; ?>" required /></td>
				</tr>
				<?php echo $LnameErr; ?>
				<tr>
					<td><label for="Adres">Adres:</label></td>
					<td><input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" required /></td>
				</tr>
				<tr>
					<td><label for="Postcode">Postcode:</label></td>
					<td><input type="text" id="Postcode" name="Postcode" value="<?php echo $Postcode; ?>" required /></td>	
				</tr>
				<?php echo $ZipErr; ?>
				<tr>
					<td><label for="Woonplaats">Woonplaats:</label></td>
					<td><input type="text" id="Woonplaats" name="Woonplaats" value="<?php echo $Woonplaats; ?>" required /></td>
				</tr>
				<?php echo $CityErr;?>
				<tr>
					<td><label for="Telefoon">Telefoon:</label></td>
					<td><input type="text" id="Telefoon" name="Telefoon" value="<?php echo $Telefoon; ?>" required /></td>
				</tr>
				<?php echo $TelErr; ?>
				<tr>
					<td><label for="Email">E-mail:</label></td>
					<td><input type="text" id="Email" name="Email" value="<?php echo $Email; ?>" required /></td>
				</tr>
				<?php echo $MailErr; ?>
				<tr>
					<td><label for="type">User type:</label></td>
					<td>
					<select name="type" onchange="this.form.submit()">
						<option value="0">Kies een usertype</option>
						<option value="1"<?php if($Level == 1){echo ' selected';} ?>>Lid</option>
						<option value="2"<?php if($Level == 2){echo ' selected';} ?>>Groepsleider</option>
						<option value="3"<?php if($Level == 3){echo ' selected';} ?>>Penningmeester</option>
						<option value="4"<?php if($Level == 4){echo ' selected';} ?>>Administrator</option>
					</select> 
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td><label for="Gebruikersnaam">Gebruikersnaam:</label></td>
					<td><input type="text" id="Gebruikersnaam" name="Gebruikersnaam" value="<?php echo $Gebruikersnaam; ?>" required /></td>
				</tr>
				<?php echo $UserErr; ?>
				<tr>
					<td><label for="Wachtwoord">Wachtwoord:</label></td>
					<td><input type="password" id="Wachtwoord" name="Wachtwoord" required /></td>
				</tr>
				<?php echo $PassErr; ?>
				<tr>
					<td><label for="Herhaalwachtwoord">Herhaal Wachtwoord:</label></td>
					<td><input type="password" id="Herhaalwachtwoord" name="Herhaalwachtwoord" required /></td>
				</tr>
				<?php echo $RePassErr; ?>
				<tr>	
					<td><input type="submit" name="Registreren" value="Registreer!" /></td>
				</tr>
			<table/>
			<?php if($Level == 1 || $Level == 2){ ?>
			<table>
				<tr>
					<td><label for="Leeftijd">Leeftijd:</label></td>
					<td><input type="number" id="Leeftijd" name="Leeftijd" required /></td>
				</tr>
				<?php echo $LeefErr; ?>
				<tr>
					<td><label for="Groep">Groep:</label></td>
					<td>
					<select name="Groep">
						<option value="0">Kies een groep</option>
						
						<?php
							$sth = $pdo->prepare("SELECT * FROM groep");
							$sth->execute();
							
							while($row = $sth->fetch())
							{
								if($row["GroepID"] == $Groep){
									echo '<option value="'.$row["GroepID"].'" selected>'.$row["Groepnaam"].'</option>';
								}
								else
								{
									echo '<option value="'.$row["GroepID"].'">'.$row["Groepnaam"].'</option>';
								}
							}
						?>
						
					</select> 
					</td>
				</tr>
			</table>
			<?php } ?>
		</form>
	</div>
</div>














