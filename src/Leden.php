<div class="row ledentabel">
<div class="col-1 "></div>
<div class="col-10">
	<?php
		$sth = $pdo->prepare('SELECT * FROM groep');
		$sth->execute();
		
		while($row = $sth->fetch())
		{
			echo '<table class="col-12">';
			echo '<tr>';
			echo '<th class="titel" colspan="4"><h1>'.$row['Groepnaam'].'</h1></th>';
			echo '</tr>';
			$groep = $row['GroepID'];
			echo '<th class="naam">Naam</th><th class="achternaam">Achternaam</th><th class="plaats">Woonplaats</th><th class="email">Email</th>';
			
			$parameters1 = array(':GroepID'=>$groep);
			$sth1 = $pdo->prepare("SELECT * FROM persoonsgegevens p, groepsleiders gl, groep g WHERE gl.PersoonsID = p.PersoonsID AND gl.GroepID = g.GroepID AND gl.GroepID = :GroepID");
			$sth1->execute($parameters1);
			
			while($row1 = $sth1->fetch())
			{
				echo '<tr>';
				echo '<td>'.$row1['Voornaam'].'</td><td>'.$row1['Achternaam'].'</td><td>'.$row1['Woonplaats'].'</td><td>'.$row1['Email'].'</td>';
				echo '</tr>';
			}
			
			$parameters2 = array(':GroepID'=>$groep);
			$sth2 = $pdo->prepare("SELECT * FROM persoonsgegevens p, leden l, groep g WHERE l.PersoonsID = p.PersoonsID AND l.GroepID = g.GroepID AND l.GroepID = :GroepID");
			$sth2->execute($parameters2);
			
			while($row2 = $sth2->fetch())
			{
				echo '<tr>';
				echo '<td>'.$row2['Voornaam'].'</td><td>'.$row2['Achternaam'].'</td><td>'.$row2['Woonplaats'].'</td><td>'.$row2['Email'].'</td>';
				echo '</tr>';
			}
			
			echo '</table>';
		}
	?>
	<!--<table class="col-12">
		<tr>
			<td class="titel" colspan="4"><h1>Groep 1A</h1></td>
		</tr>
		<tr>
			<th class="naam">Naam</th><th class="achternaam">Achternaam</th><th class="plaats">Woonplaats</th><th class="email">Email</th>
		</tr>
		<?php
			//$sth = $pdo->prepare("SELECT * FROM persoonsgegevens");
			//$sth->execute();
			
			//while($row = $sth->fetch())
			//{
			//	echo '<tr>';
			//	echo '<td>'.$row['Voornaam'].'</td><td>'.$row['Achternaam'].'</td><td>'.$row['Woonplaats'].'</td><td>'.$row['Email'].'</td>';
			//	echo '</tr>';
			//}
		?>
	</table>-->
</div>
</div>