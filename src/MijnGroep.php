<div class="row ledentabel">
	<div class="col-1 "></div>
	<div class="col-10">
		<table class="col-12">
			<tr>
				<td class="titel" colspan="4"><h1>Groep 1A</h1></td>
			</tr>
			<tr>
				<th class="naam">Naam</th><th class="achternaam">Achternaam</th><th class="plaats">Woonplaats</th><th class="email">Email</th><th class="telefoon">Telefoon</th>
			</tr>
			<?php
				$sth = $pdo->prepare("SELECT * FROM persoonsgegevens");
				$sth->execute();
				
				while($row = $sth->fetch())
				{
					echo '<tr>';
					echo '<td>'.$row['Voornaam'].'</td><td>'.$row['Achternaam'].'</td><td>'.$row['Woonplaats'].'</td><td>'.$row['Email'].'</td><td>'.$row['Telefoon'].'</td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>