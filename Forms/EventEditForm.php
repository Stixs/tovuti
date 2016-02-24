<div class="row evenementedit">
	<div class="col-1"></div>
	<div class="col-10">
		<form name="eventform" class="eventform" action="" method="post">
			<table>
				<tr>
					<th><label for="Naam">Naam Evenement:</label></th>
					<td class="" colspan="4"><input type="text" id="Naam" name="Naam" value="<?php echo $Naam; ?>" disabled /> </td>
				</tr>
				<tr>
					<th><label for="Adres">Adres:</label></th>
					<td class="eventTD"><input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" disabled /></td><?php echo $AdresErr; ?>
				
					<th><label for="Plaats">Plaats:</label></th>
					<td colspan="4"><input type="text" id="Plaats" name="Plaats" value="<?php echo $Plaats; ?>" disabled /></td><?php echo $PlaatsErr; ?>	
				</tr>
				<tr>
					<th><label for="Datum">Datum:</label></th>
					<td class="eventTD" class="eventTD"><input type="text" id="Datum" name="Datum" value="<?php echo $Datum; ?>" disabled /></td><?php echo $DatumErr;?>
				
					<th><label for="Tijd">Tijd:</label></th>
					<td><input type="text" id="Tijd" name="Tijd" value="<?php echo $Tijd; ?>" disabled /></td><?php echo $TijdErr; ?>
				</tr>
				<tr>
					<th><label for="Omschrijving">Omschrijving:</label></th>
					<td colspan ="6"><textarea name="Omschrijving" id="Omschrijving" rows="8" cols="77"  disabled ><?php echo $Omschrijving; ?></textarea>
					</td><?php echo $OmsErr; ?>
				</tr>
				<tr>	
					<td colspan="1"></td>
					<td><a class="button" href=?Page=12&event=wijzig&ID=<?php echo $EvenementID; ?>>Wijzig
					<td><a class="button buttonwarning" href=?Page=12&event=verwijder&ID=<?php echo $EvenementID; ?>>Verwijder</a></td>
				</tr>
			</table>
		</form>
	</div>
</div>














