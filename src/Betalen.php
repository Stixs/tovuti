<div class="col-2">
</div>
<div class="col-8">
<h2>Betaalstatusen</h2>
	<table class="col-12 betalen">
	<tr>
		<th class="naam">Naam</th><th class="achternaam">Achternaam</th><th class="betaalstatus">Betaalstatus</th><th class="betaalmethode">Betaalmethode</th>
	</tr>
	<?php
		$sth = $pdo->prepare("SELECT * FROM leden l, persoonsgegevens p WHERE l.PersoonsID = p.PersoonsID ORDER BY Achternaam");
		$sth->execute();
		
		while($row = $sth->fetch())
		{
			echo '<tr>';
			echo '<td>'.$row['Voornaam'].'</td><td>'.$row['Achternaam'].'</td><td>'.$row['Betaalstatus'].'</td><td>'.$row['Betaalmethode'].'</td>';
			echo '</tr>';
		}
	?>
</table>
</div>