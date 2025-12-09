<?php
session_start();
include "includes/db.php";
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include "includes/header.php";
include "includes/sidebar.php";

if (isset($_POST['add'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users(fullname, email, role) VALUES(?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $role);
    $stmt->execute();
}
?>

<h2>Gestion des utilisateurs</h2>

<form method="POST" class="form">
    <input type="text" name="fullname" placeholder="Nom complet" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="role" placeholder="Rôle" required>
    <button name="add" type="submit">Ajouter</button>
</form>

<table>
    <tr><th>ID</th><th>Nom</th><th>Email</th><th>Rôle</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".htmlspecialchars($row['id'])."</td>
                <td>".htmlspecialchars($row['fullname'])."</td>
                <td>".htmlspecialchars($row['email'])."</td>
                <td>".htmlspecialchars($row['role'])."</td>
              </tr>";
    }
    ?>
</table>

</div></div></body></html>
