<h2>Betaalstatussen</h2>
<div class="row">
	<div class="col-2">
	<form method="POST">
		<input type="hidden" name="soort" value="alle" />
		<input class type="submit" name="submit" value="Alle" />
	</form>
	</div>
	<div class="col-2">
	<form method="POST">
		<input type="hidden" name="soort" value="betaald" />
		<input type="submit" name="submit" value="Betaald" />
	</form>
	</div>
	<div class="col-2">
	<form method="POST">
		<input type="hidden" name="soort" value="nietbetaald" />
		<input type="submit" name="submit" value="Niet Betaald" />
	</form>
	</div>
	<div class="col-2">
	<form method="POST">
		<input type="hidden" name="soort" value="IDEAL" />
		<input type="submit" name="submit" value="IDEAL" />
	</form>
	</div>
	<div class="col-2">
	<form method="POST">
		<input type="hidden" name="soort" value="Overschrijving" />
		<input type="submit" name="submit" value="Overschrijving" />
	</form>
	</div>
	<div class="col-2">
	<form method="POST">
		<input type="hidden" name="soort" value="Acceptgiro" />
		<input type="submit" name="submit" value="Acceptgiro" />
	</form>
	</div>
</div>
<div class="row">
	<div class="ledentabel">
		<div class="col-2">
		</div>
		<div class="col-8">
			<table class="col-12 betalen">
			<tr>
				<th class="naam">Naam</th><th class="achternaam">Achternaam</th><th class="betaalstatus">Betaalstatus</th><th class="betaalmethode">Betaalmethode</th>
			</tr>
		<?php
		$soort = '';
		if(isset($_POST['submit'])){
			if($_POST['soort'] == 'alle')
			{
				$sth = $pdo->prepare("SELECT * FROM leden l, persoonsgegevens p WHERE l.PersoonsID = p.PersoonsID ORDER BY Achternaam");
				$sth->execute();
			}
			else
			{			
			$parameters = array(':status'=>$_POST['soort'],
								':methode'=>$_POST['soort']);
			$sth = $pdo->prepare("SELECT * FROM leden l, persoonsgegevens p WHERE l.PersoonsID = p.PersoonsID AND (betaalstatus = :status OR Betaalmethode = :methode) ORDER BY Achternaam");
			$sth->execute($parameters);
			}
		}
		else
		{
			$sth = $pdo->prepare("SELECT * FROM leden l, persoonsgegevens p WHERE l.PersoonsID = p.PersoonsID ORDER BY Achternaam");
			$sth->execute();
		}
			
			
		
			
			
			while($row = $sth->fetch())
			{
				echo '<tr>';
				echo '<td>'.$row['Voornaam'].'</td><td>'.$row['Achternaam'].'</td><td>'.$row['Betaalstatus'].'</td><td>'.$row['Betaalmethode'].'</td>';
				echo '</tr>';
			}
			
		?>
			</table>
		</div>
	</div>
</div>