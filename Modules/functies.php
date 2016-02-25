<?php

function ConnectDB()
{
	$pdo = new PDO("mysql:host=cpanel.aoweb.nl;dbname=westland_tovuti", 'westland', '8Crk3i63J1GW');
	return $pdo;
}


function LoginCheck($pdo) 
{
    // Controleren of Sessie variabelen bestaan
    if (isset($_SESSION['user_id'], $_SESSION['Gebruikersnaam'], $_SESSION['login_string'])) 
	{
        $PersoonsID = $_SESSION['user_id'];
        $Login_String = $_SESSION['login_string'];
        $Gebruikersnaam = $_SESSION['Gebruikersnaam'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
		$parameters = array(':PersoonsID'=>$PersoonsID);
		$sth = $pdo->prepare('SELECT Wachtwoord FROM inloggegevens WHERE PersoonsID = :PersoonsID LIMIT 1');
 
       	$sth->execute($parameters);

		// controleren of de klant voorkomt in de DB
		if ($sth->rowCount() == 1)
		{
			// Variabelen inlezen uit query
			$row = $sth->fetch();

			//check maken
		    $Login_Check = hash('sha512', $row['Wachtwoord'] . $user_browser);
 
				//controleren of check overeenkomt met sessie
                if ($Login_Check == $Login_String)
					return true;
                else 
                   return false;
         } else 
              return false;         
     } else 
          return false;
}

function is_email($Invoer)
  {
	 return (bool)(preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^",$Invoer));
   }

function is_minlength($Invoer, $MinLengte)
{
	return (strlen($Invoer) >= (int)$MinLengte);
}

function is_NL_PostalCode($Invoer)
{
return (bool)(preg_match('#^[1-9][0-9]{3}\h*[A-Z]{2}$#i', $Invoer));
}

function is_NL_Telnr($Invoer)
{
	return (bool)(preg_match('#^0[1-9][0-9]{0,2}-?[1-9][0-9]{5,7}$#', $Invoer) 
			   && (strlen(str_replace(array('-', ' '), '', $Invoer)) == 10));
}
function is_Numb($Invoer)
{
	return (bool)(preg_match('#^0[1-9][0-9]{0,2}-?[1-9][0-9]{5,7}$#', $Invoer));
}
function is_Char_Only($Invoer)
{
	return (bool)(preg_match("/^[a-zA-ZÖö]*$/", $Invoer));
}

function is_Username_Unique($Invoer,$pdo)
{
	$parameters = array(':Username'=>$Invoer);
	$sth = $pdo->prepare('SELECT PersoonsID FROM inloggegevens WHERE Gebruikersnaam = :Username LIMIT 1');

	$sth->execute($parameters);

	if ($sth->rowCount() == 1)
	{
		return false;//username komt voor
	}
	else
	{
		return true;//username komt niet voor
	}
}
function is_Duration($Invoer)
{
	return (int)(preg_match("/^[0-9]*$/", $Invoer));
}
?>
