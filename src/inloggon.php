<?php
function login($Username, $password, $pdo)
{
	/*
	Opdracht 3.03: Inlogsysteem
	Omschrijving: Maak een prepared statement waarbij je de gegevens van de klant ophaalt
	*/
	
	$parameters = array(':Username'=>$Username);
	$sth = $pdo->prepare('select * from klanten where Inlognaam = :Username');

	$sth->execute($parameters);


	/*
	Opdracht 3.03: Inlogsysteem
	Omschrijving: Voorzie de komende regels van commentaar, zoals in de opdracht gevraagd wordt.
	*/

	if ($sth->rowCount() == 1) 
	{
		// Variabelen inlezen uit query
		$row = $sth->fetch();
		

		$password = hash('sha512', $password . $row['Salt']);


		if ($row['Paswoord'] == $password) 
		{

			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			/*
			Opdracht 3.03: Inlogsysteem
			Omschrijving: Vul tot slot de sessie met de juiste gegevens
			*/
			$_SESSION['user_id'] = $row['KlantID'];
			$_SESSION['username'] = $row['Inlognaam'];
			$_SESSION['level'] = $row['Level'];
			$_SESSION['login_string'] = hash('sha512',
					  $password . $user_browser);
			
			// Login successful.
			return true;
		 } 
		 else 
		 {
			// password incorrect
			return false;
		 }
	}
	else
	{
		// username bestaat niet
		return false;
	}
}

//begin pagina

//het knopje inloggen van het formulier is ingedrukt.
if(isset($_POST['Inloggen']))
{
	/*
	Opdracht 3.03: Inlogsysteem
	Omschrijving: Lees de formulier gegevens uit middels de post methode. Roep vervolgens de functie login aan en geef de 3 correcte paramteres mee aan de functie. Middels een if statement kun je vervolgens controleren of de gebruiker is ingelogd en de juiste boodschap weergeven
	*/
	$username=$_POST['username'];
	$password=$_POST['password'];


	
	if (login($username, $password, $pdo))
	{
	echo 'U bent succesvol ingelogd';
	RedirectNaarPagina();
	}
	else
	{
	echo 'De gebruikersnaam of het wachtwoord is onjuist';
	header("Refresh: 2; URL=http://localhost/cinema7/index.php?PaginaNr=5");
	}


}
else
{	
	//er is nog niet op het knopje gedrukt, het formulier wordt weergegeven
	require('./Forms/InloggenForm.php');
}
?>

