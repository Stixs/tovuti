<div class="col-0_5"></div>
<div class="col-11 tableALW">
	<?php
		$sth = $pdo->prepare('SELECT * FROM groep');
		$sth->execute();
		
		while($row = $sth->fetch())
		{
			echo '<table class="col-12">';
			echo '<tr>';
			echo '<th colspan="10">'.$row['Groepnaam'].'</th>';
			echo '</tr>';
			$groep = $row['GroepID'];
			echo '<th>Achternaam</th><th>Voornaam</th><th>Adres</th><th>Woonplaats</th><th>Leeftijd</th><th>Groep</th><th>Email</th><th>Telefoon</th><th>Wijzigen</th>';
			
			$parameters = array(':GroepID'=>$groep);
			$sth1 = $pdo->prepare('SELECT * FROM persoonsgegevens p, groepsleiders gl, groep g WHERE gl.PersoonsID = p.PersoonsID AND gl.GroepID = g.GroepID AND gl.GroepID = :GroepID');
			$sth1->execute($parameters);
			$row1 = $sth1->fetch();
			if(isset($row1['PersoonsID']))
			{
				echo '<tr>';
				echo '<td>'.$row1['Achternaam'].'</td><td>'.$row1['Voornaam'].'</td><td>'.$row1['Adres'].'</td><td>'.$row1['Woonplaats'].'</td><td>'.$row1['Leeftijd'].'</td><td>'.$row1['Groepnaam'].'</td><td>'.$row1['Email'].'</td><td>'.$row1['Telefoon'].'</td><td><a href="">Wijzigen</a></td>';
				echo '</tr>';
			}
			
			$parameters = array(':GroepID'=>$groep);
			$sth2 = $pdo->prepare('SELECT * FROM persoonsgegevens p, leden l, groep g WHERE l.PersoonsID = p.PersoonsID AND l.GroepID = :GroepID AND l.GroepID = g.GroepID');
			$sth2->execute($parameters);
			
			while($row2 = $sth2->fetch())
			{
				echo '<tr>';
				echo '<td>'.$row2['Achternaam'].'</td><td>'.$row2['Voornaam'].'</td><td>'.$row2['Adres'].'</td><td>'.$row2['Woonplaats'].'</td><td>'.$row2['Leeftijd'].'</td><td>'.$row2['Groepnaam'].'</td><td>'.$row2['Email'].'</td><td>'.$row2['Telefoon'].'</td><td><a href="">Wijzigen</a></td>';
				echo '</tr>';
			}
			
			echo '</table>';
		}
	?>
</div>