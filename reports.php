<?php
session_start();
include "includes/db.php";
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include "includes/header.php";
include "includes/sidebar.php";

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO reports(title, content) VALUES(?,?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
}
?>

<h2>Rapports généraux</h2>

<form method="POST" class="form">
    <input type="text" name="title" placeholder="Titre du rapport" required>
    <textarea name="content" placeholder="Contenu du rapport" required></textarea>
    <button name="add" type="submit">Enregistrer</button>
</form>

<table>
    <tr><th>Titre</th><th>Date</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM reports");
    while($r = $result->fetch_assoc()) {
        echo "<tr>
                <td>".htmlspecialchars($r['title'])."</td>
                <td>".htmlspecialchars($r['created_at'])."</td>
            </tr>";
    }
    ?>
</table>

</div></div></body></html>
