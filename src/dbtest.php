<?php

$pdo = new PDO("mysql:host=cpanel.aoweb.nl;dbname=westland_tovuti", 'westland', '8Crk3i63J1GW');

$sth = $pdo->prepare('SELECT Voornaam FROM persoonsgegevens');
$sth->execute();

While ($row = $sth->fetch()){

echo $row['Voornaam'];
}
?>