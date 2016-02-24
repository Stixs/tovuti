<?php
if(LoginCheck($pdo) AND $_SESSION['level'] == 4){

	//init error fields
	$NaamErr = $AdresErr = $PlaatsErr = $DatumErr = $TijdErr = $OmsErr = NULL;

if(empty($_GET['event'])){
	$_GET['event'] = null;
echo '<a href=?Page=12&event=wijzig>Wijzig</a>';
echo '<a href=?Page=12&event=new>New</a>';
	
}


if($_GET['event'] == 'wijzig')
{
	if(isset($_GET['ID']))
	{
		
	$sth = $pdo->prepare("SELECT * FROM evenementen WHERE EvenementID = " . $_GET['ID']);
		$sth->execute();
		echo '<h1>Evenementen Wijzigen</h1>';
		
		$row = $sth->fetch();
		
		$EvenementID = $row["EvenementID"];
		$Naam = $row["Naam"];
		$Adres = $row["Adres"];
		$Plaats = $row["Plaats"];
		$Datum = $row["Datum"];
		$Tijd = $row['Tijd'];
		$Omschrijving = $row['Omschrijving'];
		$Datum = date('d-m-Y', strtotime($Datum));
		$Tijd = date('H:i', strtotime($Tijd));
		
		
	if(isset($_POST['submit']))
		{
		
		$Naam = $_POST["Naam"];
		$Adres = $_POST["Adres"];
		$Plaats = $_POST["Plaats"];
		$Datum = $_POST["Datum"];
		$Tijd = $_POST['Tijd'];
		$Omschrijving = $_POST['Omschrijving'];
		$Datum = date('Y-m-d', strtotime($Datum));
		
$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier
/*
		
	
	
		//BEGIN CONTROLES
	
		//controleer het naam veld
		if($Naam == null))
		{
		$NaamErr = 'Evenement naam mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Adres == null))
		{
		$AdresErr = 'Adres mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Plaats == null))
		{
		$PlaatsErr = 'Plaats mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Datum == null))
		{
		$DatumErr = 'Datum mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Tijd == null))
		{
		$TijdErr = 'Tijd mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Omschrijving == null))
		{
		$OmsErr = 'Omschrijving mag niet leeg zijn';
		$CheckOnErrors = true;
		}
	*/
		if($CheckOnErrors == true) //aanvullen
		{
		require('./Forms/EventEditSingleForm.php');
		}
		else
		{
			//formulier is succesvol gevalideerd

			
			$parameters = array(':Naam'=>$Naam,
								':Adres'=>$Adres,
								':Plaats'=>$Plaats,
								':Datum'=>$Datum,
								':Tijd'=>$Tijd,
								':Omschrijving'=>$Omschrijving,
								':EvenementID'=>$_GET['ID']);
			$sth = $pdo->prepare('UPDATE evenementen SET Naam=:Naam, Adres=:Adres, Plaats=:Plaats, Datum=:Datum, Tijd=:Tijd, Omschrijving=:Omschrijving WHERE EvenementID=:EvenementID');
			$sth->execute($parameters);
			$LastID = $pdo->lastInsertId();
		
			

			echo 'U heeft het evenement gewijzigd';
		}
		}
		else
		{
			require('./Forms/EventEditSingleForm.php');
		}
	}
	else
	{
		$sth = $pdo->prepare("SELECT * FROM evenementen");
			$sth->execute();
			echo '<h1>Evenementen Wijzigen</h1>';
			while($row = $sth->fetch())
			{
			$EvenementID = $row["EvenementID"];
			$Naam = $row["Naam"];
			$Adres = $row["Adres"];
			$Plaats = $row["Plaats"];
			$Datum = $row["Datum"];
			$Tijd = $row['Tijd'];
			$Omschrijving = $row['Omschrijving'];
			$Datum = date('d-m-Y', strtotime($Datum));
			$Tijd = date('H:i', strtotime($Tijd));
			
				require('./Forms/EventEditForm.php');
			}
	}
}
elseif($_GET['event'] == 'new')
{

	//init fields
	$Naam = $Adres = $Plaats = $Datum = $Tijd = $Omschrijving = NULL;

	//init error fields
	$NaamErr = $AdresErr = $PlaatsErr = $DatumErr = $TijdErr = $OmsErr = NULL;
	
	if(isset($_POST['submit']))
	{
		$Naam = $_POST["Naam"];
		$Adres = $_POST["Adres"];
		$Plaats = $_POST["Plaats"];
		$Datum = $_POST["Datum"];
		$Tijd = $_POST['Tijd'];
		$Omschrijving = $_POST['Omschrijving'];
		$Datum = date('Y-m-d', strtotime($Datum));
		
		$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier



		//BEGIN CONTROLES

	/*
		//controleer het naam veld
		if($Naam == null))
		{
		$NaamErr = 'Evenement naam mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Adres == null))
		{
		$AdresErr = 'Adres mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Plaats == null))
		{
		$PlaatsErr = 'Plaats mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Datum == null))
		{
		$DatumErr = 'Datum mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Tijd == null))
		{
		$TijdErr = 'Tijd mag niet leeg zijn';
		$CheckOnErrors = true;
		}
		if($Omschrijving == null))
		{
		$OmsErr = 'Omschrijving mag niet leeg zijn';
		$CheckOnErrors = true;
		}
	*/
		if($CheckOnErrors == true) //aanvullen
		{
		echo '<h1>Evenement Toevoegen</h1>';
		require('./Forms/EventForm.php');
		}
		else
		{
			//formulier is succesvol gevalideerd

			
			$parameters = array(':Naam'=>$Naam,
								':Adres'=>$Adres,
								':Plaats'=>$Plaats,
								':Datum'=>$Datum,
								':Tijd'=>$Tijd,
								':Omschrijving'=>$Omschrijving);
			$sth = $pdo->prepare('INSERT INTO evenementen (Naam, Omschrijving, Adres, Plaats, Datum, Tijd) VALUES (:Naam, :Omschrijving, :Adres, :Plaats, :Datum, :Tijd)');
			$sth->execute($parameters);
			$LastID = $pdo->lastInsertId();
		
			

			echo 'U heeft het evenement aangemaakt';
		}
	}
	else
	{
		echo '<h1>Evenement Toevoegen</h1>';
		require('./Forms/EventForm.php');
	}
}
}
?>




	
