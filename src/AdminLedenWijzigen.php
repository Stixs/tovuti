<?php
	if(LoginCheck($pdo))
	{
		if($_SESSION['level'] == 4)
		{
			if(isset($_GET['Action']))
			{
				$Action = $_GET['Action'];
				
				switch($Action)
				{
					case 'Edit':
						$Achternaam = $Voornaam = $Adres = $Woonplaats = $Groep = $Telefoon = $Userlevel = $Leeftijd = NULL;
						
						$CheckOnErrors = false;
						
						if(isset($_POST['Aanpassen']))
						{
							$Achternaam = $_POST['Achternaam'];
							$Voornaam = $_POST['Voornaam'];
							$Adres = $_POST['Adres'];
							$Woonplaats = $_POST['Woonplaats'];
							$Groep = $_POST['Groep'];
							$Telefoon = $_POST['Telefoon'];
							$Userlevel = $_POST['Userlevel'];
							$Leeftijd = $_POST['Leeftijd'];
							
							if($CheckOnErrors == true)
							{
								require ('./Forms/AdminLedenWijzigenForm.php');
							}
							else
							{
								$parameters = array(':PID'=>$_GET['PID'],
													':Achternaam'=>$Achternaam,
													':Voornaam'=>$Voornaam,
													':Adres'=>$Adres,
													':Woonplaats'=>$Woonplaats,
													':Telefoon'=>$Telefoon);
								$sth = $pdo->prepare('UPDATE persoonsgegevens SET Achternaam = :Achternaam, Voornaam = :Voornaam, Adres = :Adres, Woonplaats = :Woonplaats, Telefoon = :Telefoon WHERE PersoonsID = :PID');
								$sth->execute($parameters);
								
								$para = array(':PID'=>$_GET['PID']);
								$sth1 = $pdo->prepare('SELECT * FROM inloggegevens WHERE PersoonsID = :PID');
								$sth1->execute($para);
								
								$roww = $sth1->fetch();
								if($Userlevel != $roww['Level'])
								{
									if($Userlevel == 1)
									{
										$sth2 = $pdo->prepare('SELECT * FROM groepsleiders');
										$sth2->execute();
										$roww1 = $sth2->fetch();

										$para3 = array (':PersoonsID'=>$roww1['PersoonsID'],
														':GroepID'=>$roww1['GroepID'],
														':Leeftijd'=>$roww1['Leeftijd']);
										$sth3 = $pdo->prepare('INSERT INTO leden (PersoonsID, GroepID, Leeftijd) VALUES (:PersoonsID, :GroepID, :Leeftijd)');
										$sth3->execute($para3);
										
										$para3 = array (':PersoonsID'=>$_GET['PID']);
										$sth3 = $pdo->prepare('DELETE FROM groepsleiders WHERE PersoonsID = :PersoonsID');
										$sth3->execute($para3);
									}
									elseif($Userlevel == 2)
									{
										$sth3 = $pdo->prepare('SELECT * FROM leden');
										$sth3->execute();
										$roww2 = $sth3->fetch();
										
										$para3 = array (':PersoonsID'=>$roww2['PersoonsID'],
														':GroepID'=>$roww2['GroepID'],
														':Leeftijd'=>$roww2['Leeftijd']);
										$sth3 = $pdo->prepare('INSERT INTO groepsleiders (PersoonsID, GroepID, Leeftijd) VALUES (:PersoonsID, :GroepID, :Leeftijd)');
										$sth3->execute($para3);
										
										$para3 = array (':PersoonsID'=>$_GET['PID']);
										$sth3 = $pdo->prepare('DELETE FROM leden WHERE PersoonsID = :PersoonsID');
										$sth3->execute($para3);
									}
								}
								
								$parameters = array(':PID'=>$_GET['PID'],
													':Userlevel'=>$Userlevel);
								$sth = $pdo->prepare('UPDATE inloggegevens SET Level = :Userlevel WHERE PersoonsID = :PID');
								$sth->execute($parameters);
								
								
								if($Userlevel == 1)
								{
									$parameters = array(':PID'=>$_GET['PID'],
														':Groep'=>$Groep,
														':Leeftijd'=>$Leeftijd);
									$sth = $pdo->prepare('UPDATE leden SET GroepID = :Groep, Leeftijd = :Leeftijd WHERE PersoonsID = :PID');
									$sth->execute($parameters);
								}
								elseif($Userlevel == 2)
								{
									$parameters = array(':PID'=>$_GET['PID'],
														':Groep'=>$Groep,
														':Leeftijd'=>$Leeftijd);
									$sth = $pdo->prepare('UPDATE groepsleiders SET GroepID = :Groep, Leeftijd = :Leeftijd WHERE PersoonsID = :PID');
									$sth->execute($parameters);
								}
								
								echo 'U heeft de gegevens succesvol gewijzigd.';
								header('Refresh 3, URL=index.php?Page=10');
							}
						}
						else
						{
							
							
							/*$parameters	= array(':PID'=>$_GET['PID'],
												':PID1'=>'PersoonsID',
												':PID2'=>'PersoonsID',
												':PID3'=>'PersoonsID',
												':PID4'=>$_GET['PID'],
												':PID5'=>'PersoonsID',
												':PID6'=>'PersoonsID',
												':PID7'=>'PersoonsID');
							$sth = $pdo->prepare('SELECT * FROM groepsleiders gl, leden l, inloggegevens ig, persoonsgegevens pg WHERE pg.PersoonsID = :PID AND ig.PersoonsID = pg.:PID1 AND gl.PersoonsID = pg.:PID2 AND pg.PersoonsID = gl.:PID3 OR pg.PersoonsID = :PID4 AND ig.PersoonsID = pg.:PID5 AND l.PersoonsID = pg.:PID6 AND pg.PersoonsID = l.:PID7');
							$sth->execute($parameters);
							$parameters	= array(':PID'=>$_GET['PID'],
												':PID1'=>'PersoonsID',
												':PID2'=>'PersoonsID',
												':PID3'=>'PersoonsID',
												':PID4'=>$_GET['PID'],
												':PID5'=>'PersoonsID',
												':PID6'=>'PersoonsID',
												':PID7'=>'PersoonsID');*/
							$parameters = array (':PID'=>$_GET['PID']);
							$sth = $pdo->prepare('SELECT * FROM groepsleiders gl, leden l, inloggegevens ig, persoonsgegevens pg WHERE pg.PersoonsID = :PID AND ig.PersoonsID = pg.PersoonsID AND gl.PersoonsID = pg.PersoonsID AND pg.PersoonsID = gl.PersoonsID OR pg.PersoonsID = :PID AND ig.PersoonsID = pg.PersoonsID AND l.PersoonsID = pg.PersoonsID AND pg.PersoonsID = l.PersoonsID');
							$sth->execute($parameters);
							
							$row = $sth->fetch();
							
							
							$_SESSION['Achternaam'] = $row['Achternaam'];
							$_SESSION['Voornaam'] = $row['Voornaam'];
							$_SESSION['Adres'] = $row['Adres'];
							$_SESSION['Woonplaats'] = $row['Woonplaats'];
							$_SESSION['Groep'] = $row['GroepID'];
							$_SESSION['Telefoon'] = $row['Telefoon'];
							$_SESSION['Userlevel'] = $row['Level'];
							$_SESSION['Leeftijd'] = $row['Leeftijd'];
							
							
							
							require ('./Forms/AdminLedenWijzigenForm.php');
						}
					break;
				}
			}
			else
			{
	
?>
				<div class="row">
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
									echo '<td>'.$row1['Achternaam'].'</td><td>'.$row1['Voornaam'].'</td><td>'.$row1['Adres'].'</td><td>'.$row1['Woonplaats'].'</td><td>'.$row1['Leeftijd'].'</td><td>'.$row1['Groepnaam'].'</td><td>'.$row1['Email'].'</td><td>'.$row1['Telefoon'].'</td><td><a href="./index.php?Page=10&Action=Edit&PID='.$row1['PersoonsID'].'">Wijzigen</a></td>';
									echo '</tr>';
								}
								
								$parameters = array(':GroepID'=>$groep);
								$sth2 = $pdo->prepare('SELECT * FROM persoonsgegevens p, leden l, groep g WHERE l.PersoonsID = p.PersoonsID AND l.GroepID = :GroepID AND l.GroepID = g.GroepID');
								$sth2->execute($parameters);
								
								while($row2 = $sth2->fetch())
								{
									echo '<tr>';
									echo '<td>'.$row2['Achternaam'].'</td><td>'.$row2['Voornaam'].'</td><td>'.$row2['Adres'].'</td><td>'.$row2['Woonplaats'].'</td><td>'.$row2['Leeftijd'].'</td><td>'.$row2['Groepnaam'].'</td><td>'.$row2['Email'].'</td><td>'.$row2['Telefoon'].'</td><td><a href="./index.php?Page=10&Action=Edit&PID='.$row2['PersoonsID'].'">Wijzigen</a></td>';
									echo '</tr>';
								}
								
								echo '</table>';
							}
						?>
					</div>
				</div>
<?php
			}
		}
		else
		{
			echo 'U heeft niet de juiste bevoegdheid voor deze pagina.';
			header('Refresh 3, URL=./index.php?Page=1');
		}
	}
	else
	{
		header('Refresh 3, URL=./index.php?Page=1');
	}
?>