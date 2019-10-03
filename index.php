<?php
if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}

session_start();

if (isset($_SESSION['naam'])) {
    header('Location:home.php');
}

include 'verbinding.php';

if(isset($_POST['login'])) {
    $pwd = $_POST['pwd'];
    $mail = $_POST['mail'];
    $stmt = $conn->prepare("SELECT * FROM persoon WHERE email = :mail LIMIT 1");
    $stmt->execute([ ':mail' => $mail ]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if( ! $row)
    {
        echo "<script type= 'text/javascript'>alert('Verkeerde gegevens ingevuld');</script>";
    }
    else
    {
        $count = $stmt->rowCount();
        if($count > 0)
        {
            if(password_verify($pwd, $row['wachtwoord']))
            {
                $_SESSION['id'] = $row['id'];
                $_SESSION['naam'] = $row['voornaam'];
                header("location:home.php");
                return;
            }
            else
            {
                echo "<script type= 'text/javascript'>alert('Verkeerde gegevens ingevuld');</script>";
            }
        }
    }
}
?>
<h1><b>Op deze website kunt u een account aanmaken om u aan te melden voor een feest.</b></h1>

<h1>Login</h1>
<hr>
<form method="post">
    <label>email:</label>
    <input type="text" name="mail" id="mail" required placeholder=""><br>
    <label>password:</label>
    <input type="password" name="pwd" id="pwd" required placeholder=""><br>
    <input type="submit" name="login" value="login"><br>
    <br><br><br><br>
    <br><br><br><br>
    <a href="aanmaken.php">Account aanmaken</a>
</form>