<?php
session_start();
include "includes/db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($pass, $row['password'])) {
            $_SESSION['admin'] = $row['username'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Mot de passe incorrect";
        }
    } else {
        $error = "Utilisateur introuvable";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/style.css">
    <title>Connexion Admin</title>
</head>
<body class="login-body">

<form class="login-box" method="POST">
    <h2>Connexion Admin</h2>
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit" name="login">Connexion</button>
    <?php if(isset($error)) echo "<p class='error'>".htmlspecialchars($error)."</p>"; ?>
</form>

</body>
</html>
