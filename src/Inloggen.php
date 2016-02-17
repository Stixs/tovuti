<?php

function login($Gebruikersnaam, $password, $pdo)
{
	
	$parameters = array(':Gebruikersnaam'=>$Gebruikersnaam);
	$sth = $pdo->prepare('select * from inloggegevens where Gebruikersnaam = :Gebruikersnaam');

	$sth->execute($parameters);

	if ($sth->rowCount() == 1) 
	{
		// Variabelen inlezen uit query
		$row = $sth->fetch();
		

		$password = hash('sha512', $password . $row['Salt']);


		if ($row['Wachtwoord'] == $password) 
		{

			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			
			$_SESSION['user_id'] = $row['PersoonsID'];
			$_SESSION['username'] = $row['Gebruikersnaam'];
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
	
	$Gebruikersnaam=$_POST['username'];
	$password=$_POST['password'];


	
	if (login($Gebruikersnaam, $password, $pdo))
	{
	echo 'U bent succesvol ingelogd';
	}
	else
	{
	echo 'De gebruikersnaam of het wachtwoord is onjuist';
	}


}
else
{	
	//er is nog niet op het knopje gedrukt, het formulier wordt weergegeven
	require('./Forms/InlogForm.php');
}
?>

