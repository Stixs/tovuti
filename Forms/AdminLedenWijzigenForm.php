<?php
	$Voornaam = $_SESSION['Voornaam'];
	$Achternaam = $_SESSION['Achternaam'];
	$Adres = $_SESSION['Adres'];
	$Woonplaats = $_SESSION['Woonplaats'];
	$Groep = $_SESSION['Groep'];
	$Telefoon = $_SESSION['Telefoon'];
	$Userlevel = $_SESSION['Userlevel'];
	$Leeftijd = $_SESSION['Leeftijd'];
?>

<div class="row">
	<h1><?php $Voornaam."'s gegevens wijzigen" ?></h1>
	<form action="" method="post">
		<table>
			<tr>
				<td><label for="Voornaam">Voornaam: </label></td>
				<td><input type="text" id="Voornaam" name="Voornaam" value="<?php echo $Voornaam; ?>" required /></td>
			</tr>
			<tr>
				<td><label for="Achternaam">Achternaam: </label></td>
				<td><input type="text" id="Achternaam" name="Achternaam" value="<?php echo $Achternaam; ?>" required /></td>
			</tr>
			<tr>
				<td><label for="Adres">Adres: </label></td>
				<td><input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" required /></td>
			</tr>
			<tr>
				<td><label for="Woonplaats">Woonplaats: </label></td>
				<td><input type="text" id="Woonplaats" name="Woonplaats" value="<?php echo $Woonplaats; ?>" required /></td>
			</tr>
			<tr>
				<td><label for="Groep">Groep: </label></td>
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
			<tr>
				<td><label for="Telefoon">Telefoon: </label></td>
				<td><input type="text" id="Telefoon" name="Telefoon" value="<?php echo $Telefoon; ?>" required /></td>
			</tr>
			<tr>
				<td><label for="Userlevel">Userlevel: </label></td>
				<td><input type="number" id="Userlevel" name="Userlevel" value="<?php echo $Userlevel; ?>" required /></td>
			</tr>
			<tr>
				<td><label for="Leeftijd">Leeftijd: </label></td>
				<td><input type="text" id="Leeftijd" name="Leeftijd" value="<?php echo $Leeftijd; ?>" required /></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="Aanpassen" value="Aanpassen" />
				</td>
			</tr>
		</table>
	</form>
</div>