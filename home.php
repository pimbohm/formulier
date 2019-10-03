<?php
session_start();
include 'verbinding.php';
$user = $_SESSION['voornaam'] . ' ' . $_SESSION['id'] . '<br/><br/>';
echo $user;

    $stmt = $conn->prepare("SELECT naam, active FROM event");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        echo $row['naam']."<button>aanmelden</button><br/>";
    }
?>

<button><a href="destroy.php">Uitloggen</a></button>
