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
					<td class="eventTD"><input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" disabled /></td>
				
					<th><label for="Plaats">Plaats:</label></th>
					<td colspan="4"><input type="text" id="Plaats" name="Plaats" value="<?php echo $Plaats; ?>" disabled /></td>
				</tr>
				<tr>
					<th><label for="Datum">Datum:</label></th>
					<td class="eventTD" class="eventTD"><input type="text" id="Datum" name="Datum" value="<?php echo $Datum; ?>" disabled /></td>
				
					<th><label for="Tijd">Tijd:</label></th>
					<td><input type="text" id="Tijd" name="Tijd" value="<?php echo $Tijd; ?>" disabled /></td>
				</tr>
				<tr>
					<th><label for="Omschrijving">Omschrijving:</label></th>
					<td colspan ="6"><textarea name="Omschrijving" id="Omschrijving" rows="8" cols="77"  disabled ><?php echo $Omschrijving; ?></textarea>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>