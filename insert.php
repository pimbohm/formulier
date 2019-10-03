<?php

session_start();

include 'verbinding.php';

$stmt = $conn->prepare("INSERT INTO persoon (voornaam, tussenvoegsel, achternaam, postcode, adres, huisnummer, leeftijd, email, bank, wachtwoord)
VALUES (:vn, :tv, :an, :pc, :adres, :hn, :lt, :em, :ba, :ww)");
$stmt->bindParam(':vn', $voornaam);
$stmt->bindParam(':tv', $tussenvoegsel);
$stmt->bindParam(':an', $achternaam);
$stmt->bindParam(':pc', $postcode);
$stmt->bindParam(':adres', $adres);
$stmt->bindParam(':hn', $huisnummer);
$stmt->bindParam(':lt', $leeftijd);
$stmt->bindParam(':em', $email);
$stmt->bindParam(':ba', $bank);
$stmt->bindParam(':ww', $hash);

$voornaam = $_SESSION["voornaam"];
$tussenvoegsel = $_SESSION["tussenvoegsel"];
$achternaam = $_SESSION["achternaam"];
$postcode = $_SESSION["postcode"];
$adres = $_SESSION["adres"];
$huisnummer = $_SESSION["huisnummer"];
$leeftijd = $_SESSION["leeftijd"];
$email = $_SESSION["email"];
$bank = $_SESSION["bank"];
$wachtwoord = $_SESSION["wachtwoord"];
$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

$stmt->execute();

header('Location:index.php?msg=bedankt+voor+het+aanmelden?msg=bedankt+voor+het+aanmelden');
?>