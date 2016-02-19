<div class="col-0_5"></div>
<div class="col-11 tableALW">
	<table class="col-12">
		<tr>
			<th colspan="10" style="text-align: center;"><h1>Leden Wijzigen</h1></th>
		</tr>
		<tr>
			<th>Achternaam</th><th>Voornaam</th><th>Adres</th><th>Woonplaats</th><th>Leeftijd</th><th>Groep</th><th>Email</th><th>Telefoon</th><th>Userlevel</th><th>Wijzigen</th>
		</tr>
		<?php
			$parameters = array(':PersoonsID'=>'PersoonsID',
								':GroepID'=>'GroepID');
			$sth = $pdo->prepare('SELECT * FROM persoonsgegevens p, groepsleiders gl, leden l, groep g WHERE gl.PersoonsID = p.:PersoonsID OR l.PersoonsID = p.:PersoonsID OR l.GroepID = g.:GroepID OR gl.GroepID = g.:GroepID');
			$sth->execute($parameters);
			
			while($row = $sth->fetch())
			{
				echo '<tr>';
				echo '<td>'.$row['Achternaam'].'</td><td>'.$row['Voornaam'].'</td><td>'.$row['Adres'].'</td><td>'.$row['Woonplaats'].'</td><td>'.$row['Leeftijd'].'</td><td>'.$row['Groep'].'</td><td>'.$row['Email'].'</td><td>'.$row['Telefoon'].'</td><td>'.$row['Userlevel'].'<td><a href="">Wijzigen</td>';
				echo '</tr>';
			}
			var_dump($row['Achternaam']);
		?>
	</table>
</div>