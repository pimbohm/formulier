<!DOCTYPE html>
<html>
<head>

</head>
<body>
<b>* is required</b>
<form method="post" action="controle.php">
    <label>Voornaam: </label>
    <input type="text" name="voornaam" required>
    *
    <br/>
    <label>Tussenvoegsel</label>
    <input type="text" name="tussenvoegsel">
    <br/>
    <label>Achternaam: </label>
    <input type="text" name="achternaam" required>
    *
    <br/>
    <label>Postcode: </label>
    <input type="text" name="postcode">
    <br/>
    <label>Adres: </label>
    <input type="text" name="adres">
    <br/>
    <label>Huisnummer: </label>
    <input type="text" name="huisnummer">
    <br/>
    <label>Leeftijd: </label>
    <input type="text" name="leeftijd" required>
    *
    <br/>
    <label>Email: </label>
    <input type="email" name="email" required>
    *
    <br/>
    <label>Bankrekeningnummer: </label>
    <input type="text" name="bank" maxlength="10" required>
    *
    <br/>
    <label>Wachtwoord: </label>
    <input type="password" name="wachtwoord" required>
    *
    <br/>
    <label>Wachtwoord herhalen: </label>
    <input type="password" name="ww" required>
    *
    <br/>
    <br/>
    <label>Ik ga akkoord met de AVG wetgeving: </label>
    <input type="checkbox" required>
    *
    <br/><br/>
    <input type="submit" name="ok" value="Aanmelden">
</form>
</body>
</html>