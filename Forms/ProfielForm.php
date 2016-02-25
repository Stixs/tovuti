<div class="row registreren">
	<div class="col-1"></div>
	<div class="col-10">
		<h1>Mijn Profiel</h1>
		<form name="RegistratieFormulier" action="" method="post">
			<table>
				<tr>
					<th><label for="Voornaam">Voornaam:</label></th>
					<td><?php echo $Voornaam; ?></td>
				</tr>
				<tr>
					<th><label for="Achternaam">Achternaam:</label></th>
					<td><?php echo $Achternaam; ?></td>
				</tr>
				<tr>
					<th><label for="Adres">Adres:</label></th>
					<td><?php echo $Adres; ?></td>
				</tr>
				<tr>
					<th><label for="Postcode">Postcode:</label></th>
					<td><?php echo $Postcode; ?></td>
				</tr>
				<tr>
					<th><label for="Woonplaats">Woonplaats:</label></th>
					<td><?php echo $Woonplaats; ?></td>
				</tr>
				<tr>
					<th><label for="Telefoon">Telefoon:</label></th>
					<td><?php echo $Telefoon; ?></td>
				</tr>
				<tr>
					<th><label for="Email">E-mail:</label></th>
					<td><?php echo $Email; ?></td>
				</tr>
				<tr>
					<th><label for="Leeftijd">Leeftijd:</label></t>
					<td><?php echo $Leeftijd; ?></td>
				</tr>
				<tr>
					<th><label for="Methode">Betaalmethode:</label></t>
					<td><?php echo $Betaalmethode; ?></td>
				</tr>
				<tr>
					<th><label for="Gebruikersnaam">Gebruikersnaam:</label></th>
					<td><?php echo $Gebruikersnaam; ?></td>
				</tr>
				<tr>	
					<td><input type="submit" name="wijzigprofiel" value="Bewerk profiel" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>














