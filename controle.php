<?php
session_start();

include "verbinding.php";

$voornaam = $_SESSION['voornaam'] = $_POST['voornaam'];
$tussenvoegsel = $_SESSION['tussenvoegsel'] = $_POST['tussenvoegsel'];
$achternaam = $_SESSION['achternaam'] = $_POST['achternaam'];
$adres = $_SESSION['adres'] = $_POST['adres'];
$leeftijd = $_SESSION['leeftijd'] = $_POST['leeftijd'];
$email = $_SESSION['email'] = $_POST['email'];
$bank = $_SESSION['bank'] = $_POST['bank'];
$huisnummer = $_SESSION['huisnummer'] = $_POST['huisnummer'];
$postcode = $_SESSION['postcode'] = $_POST['postcode'];
$wachtwoord = $_SESSION['wachtwoord'] = $_POST['wachtwoord'];
$ww = $_SESSION['ww'] = $_POST['ww'];
$banknum = is_numeric($_POST['bank']);

$stmt = $conn->prepare("SELECT count(*) as nummer FROM `persoon` WHERE email = '$email'");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

while ($row = $stmt->fetch()) {
    global $already;
    $already = $row['nummer'];
}

if (strlen($voornaam) < 2) {
    echo 'Uw voornaam moet minimaal 2 letters bevatten.<br/><br/>';
} elseif (1 === preg_match('~[0-9]~', $voornaam)) {
    echo 'Uw voornaam mag alleen maar uit letters bestaaan<br/><br/>';
} elseif (strlen($achternaam) < 2 ) {
    echo 'Uw achternaam moet minimaal 2 letters bevatten.<br/><br>';
} elseif (1 === preg_match('~[0-9]~', $achternaam)) {
    echo 'Uw achternaam mag alleen maar uit letters bestaaan<br/><br/>';
} elseif ($leeftijd < 18) {
    echo "Je bent te jong je moet miniaal 18 zijn<br><br>";
} elseif ($banknum == false) {
    echo "Je bankrekeninnummer mag uitsluitend nummers bevatten<br><br>";
} elseif (strlen($bank) < 10) {
    echo 'Uw bankrekeningnummer moet uit 10 nummers bestaan<br><br>';
} elseif ($wachtwoord != $ww) {
    echo 'Uw wachtwoorden komen niet overeen<br><br>';
} elseif ($already >= 1) {
    echo 'Dit emailades bestaat al<br><br>';
} else {
    header('Location:insert.php');
}
    ?>
    <form method="post">
        <label>Voornaam: </label>
        <input type="text" name="voornaam" value="<?php echo $voornaam; ?>" required>
        *
        <br/>
        <label>Tussenvoegsel: </label>
        <input type="text" name="tussenvoegsel" value="<?php echo $tussenvoegsel; ?>">
        <br/>
        <label>Achternaam: </label>
        <input type="text" name="achternaam" value="<?php echo $achternaam; ?>" required>
        *
        <br/>
        <label>Postcode: </label>
        <input type="text" name="postcode" value="<?php echo $postcode; ?>">
        <br/>
        <label>Adres: </label>
        <input type="text" name="adres" value="<?php echo $adres; ?>">
        <br/>
        <label>Huisnummer: </label>
        <input type="text" name="huisnummer" value="<?php echo $huisnummer; ?>">
        <br/>
        <label>Leeftijd: </label>
        <input type="number" name="leeftijd" value="<?php echo $leeftijd; ?>" required>
        *
        <br/>
        <label>Email: </label>
        <input type="text" name="email" value="<?php echo $email; ?>" required>
        *
        <br/>
        <label>Bankrekeningnummer: </label>
        <input type="text" name="bank" value="<?php echo $bank; ?>" maxlength="10" required>
        *
        <br/>
        <label>Wachtwoord: </label>
        <input type="password" name="wachtwoord" value="<?php echo $wachtwoord; ?>" required>
        *
        <br/>
        <label>Wachtwoord herhalen: </label>
        <input type="password" name="ww" value="<?php echo $ww; ?>" required>
        *
        <br/><br/>
        <input type="submit" name="ok" value="Wijzigen">
    </form>