<div class="row evenement">
	<div class="col-1"></div>
	<div class="col-10">
		<form name="RegistratieFormulier" action="" method="post">
			<table>
				<tr>
					<th><label for="Naam">Naam Evenement:</label></th>
					<td class="" colspan="4"><input type="text" id="Naam" name="Naam" value="<?php echo $Naam; ?>"/></td><?php echo $NaamErr; ?>
				</tr>
				<tr>
					<th><label for="Adres">Adres:</label></th>
					<td class="eventTD"><input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" /></td><?php echo $AdresErr; ?>
				
					<th><label for="Plaats">Plaats:</label></th>
					<td colspan="4"><input type="text" id="Plaats" name="Plaats" value="<?php echo $Plaats; ?>" /></td><?php echo $PlaatsErr; ?>	
				</tr>
				<tr>
					<th><label for="Datum">Datum:</label></th>
					<td class="eventTD" class="eventTD"><input type="text" id="Datum" name="Datum" value="<?php echo $Datum; ?>" /></td><?php echo $DatumErr;?>
				
					<th><label for="Tijd">Tijd:</label></th>
					<td><input type="text" id="Tijd" name="Tijd" value="<?php echo $Tijd; ?>" /></td><?php echo $TijdErr; ?>
				</tr>
				<tr>
					<th><label for="Omschrijving">Omschrijving:</label></th>
					<td colspan ="6"><textarea name="Omschrijving" id="Omschrijving" rows="8" cols="77"><?php echo $Omschrijving; ?></textarea>
					</td><?php echo $OmsErr; ?>
				</tr>
				<tr>	
					<td colspan="1"></td>
					<td><input type="submit" name="submit" value="Wijzig" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>














