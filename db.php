<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "school_admin";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erreur connexion DB : " . $conn->connect_error);
}
?>
