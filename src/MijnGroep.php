<div class="row ledentabel">
	<div class="col-1 "></div>
	<div class="col-10">
		<table class="col-12 MijnGroep">
			<?php
				$parameters = array(':PID'=>$_SESSION['user_id']);
				$sth = $pdo->prepare('SELECT * FROM groep g, leden l WHERE l.PersoonsID = :PID AND l.GroepID = g.GroepID');
				$sth->execute($parameters);
				$row = $sth->fetch();
				
				$groep = $row['GroepID'];
				
				echo '<tr>';
				echo '<td class="titel" colspan="5"><h1>Groep '.$row['Groepnaam'].'</h1></td>';
				echo '</tr>';
			?>
			<tr>
				<th class="naam">Naam</th><th class="achternaam">Achternaam</th><th class="plaats">Woonplaats</th><th class="email">Email</th><th class="telefoon">Telefoon</th>
			</tr>
			<?php
				$parameters = array (':GID'=>$groep);
				$sth = $pdo->prepare("SELECT * FROM persoonsgegevens p, groepsleiders gl WHERE p.PersoonsID = gl.PersoonsID AND gl.GroepID = :GID");
				$sth->execute($parameters);
				
				while($row = $sth->fetch())
				{
					echo '<tr class="groepsleider">';
					echo '<td>'.$row['Voornaam'].'</td><td>'.$row['Achternaam'].'</td><td>'.$row['Woonplaats'].'</td><td>'.$row['Email'].'</td><td>'.$row['Telefoon'].'</td>';
					echo '</tr>';
				}
				
				$parameters1 = array (':GID'=>$groep);
				$sth1 = $pdo->prepare("SELECT * FROM persoonsgegevens p, leden l WHERE p.PersoonsID = l.PersoonsID AND l.GroepID = :GID");
				$sth1->execute($parameters1);
				
				while($row1 = $sth1->fetch())
				{
					echo '<tr>';
					echo '<td>'.$row1['Voornaam'].'</td><td>'.$row1['Achternaam'].'</td><td>'.$row1['Woonplaats'].'</td><td>'.$row1['Email'].'</td><td>'.$row1['Telefoon'].'</td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>