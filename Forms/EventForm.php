<div class="row registreren">
	<div class="col-1"></div>
	<div class="col-10">
		<h1>Registreren</h1>
		<form name="RegistratieFormulier" action="" method="post">
			<table>
				<tr>
					<td><label for="Naam">Naam Evenement:</label></td>
					<td><input type="text" id="Naam" name="Naam" value="<?php echo $Naam; ?>"/></td><?php echo $NaamErr; ?>
				</tr>
				<tr>
					<td><label for="Adres">Adres:</label></td>
					<td><input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" /></td><?php echo $AdresErr; ?>
				</tr>
				<tr>
					<td><label for="Plaats">Plaats:</label></td>
					<td><input type="text" id="Plaats" name="Plaats" value="<?php echo $Plaats; ?>" /></td><?php echo $PlaatsErr; ?>	
				</tr>
				<tr>
					<td><label for="Datum">Datum:</label></td>
					<td><input type="text" id="Datum" name="Datum" value="<?php echo $Datum; ?>" /></td><?php echo $DatumErr;?>
				</tr>
				<tr>
					<td><label for="Tijd">Tijd:</label></td>
					<td><input type="text" id="Tijd" name="Tijd" value="<?php echo $Tijd; ?>" /></td><?php echo $TijdErr; ?>
				</tr>
				<tr>
					<td><label for="Omschrijving">Omschrijving:</label>
					 <textarea name="Omschrijving" id="Omschrijving" rows="4" cols="50">
						<?php echo $Omschrijving; ?>
					</textarea>
					</td><?php echo $OmsErr; ?>
				</tr>
			<table/>
		</form>
	</div>
</div>














