<?php
if(LoginCheck($pdo) AND $_SESSION['level'] == 4){

	//init error fields
	$NaamErr = $AdresErr = $PlaatsErr = $DatumErr = $TijdErr = $OmsErr = NULL;

if(empty($_GET['event'])){
$_GET['event'] = null;

echo '<div class="row">';
echo '<a class="button buttonbig "href=?Page=12&event=wijzig>Wijzig</a>';
echo '<a class="button buttonbig "href=?Page=12&event=new>Nieuw</a>';
echo '</div>';
	
}


if($_GET['event'] == 'wijzig')
{
	if(isset($_GET['ID']))
	{
		
	$sth = $pdo->prepare("SELECT * FROM evenementen WHERE EvenementID = " . $_GET['ID']);
		$sth->execute();
		echo '<h2>Evenement Wijzigen</h2>';
		
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
		
		
	if(isset($_POST['wijzig']))
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
		
			

			header("Refresh: 0;URL=index.php?Page=12&event=wijzig");
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
			echo '<h2>Evenementen Wijzigen</h2>';
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
		echo '<h2>Evenement Toevoegen</h2>';
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
		
			

			header("Refresh: 0;URL=index.php?Page=12&event=wijzig");
		}
	}
	else
	{
		echo '<h2>Evenement Toevoegen</h2>';
		require('./Forms/EventForm.php');
	}
}
elseif($_GET['event'] == 'verwijder')
	{		
	echo'<h3>Weet je zeker dat je dit evenement wil verwijderen?</h3>';
	echo'<div class=confirm>';
	echo'<form method="post">';
	echo'<input class="buttonspaced buttonwarning" type="submit" name="ja" value="Ja" />';
	echo'<input class="buttonspaced" type="submit" name="nee" value="Nee" />';
	echo'</from>';
	echo'</div>';
	if(isset($_POST['ja']))
		{
			$parameters = array(':EvenementID'=>$_GET['ID']);
			$sth = $pdo->prepare('DELETE FROM evenementen WHERE EvenementID = :EvenementID');
			$sth->execute($parameters);
			$LastID = $pdo->lastInsertId();
			header("Refresh: 0;URL=index.php?Page=12&event=wijzig");
		}
	elseif(isset($_POST['nee']))
		{
			header("Refresh: 0;URL=index.php?Page=12&event=wijzig");
		}
	}
	
}
?>




	
