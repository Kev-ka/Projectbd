<?php
session_start();
include "includes/db.php";
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include "includes/header.php";
include "includes/sidebar.php";

if (isset($_POST['add'])) {
    $class = $_POST['class'];
    $course = $_POST['course'];
    $day = $_POST['day'];
    $time = $_POST['time'];

    $stmt = $conn->prepare("INSERT INTO schedules(class_name, course, day, time) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss", $class, $course, $day, $time);
    $stmt->execute();
}
?>

<h2>Gestion des emplois du temps</h2>

<form method="POST" class="form">
    <input type="text" name="class" placeholder="Classe" required>
    <input type="text" name="course" placeholder="Cours" required>
    <input type="text" name="day" placeholder="Jour" required>
    <input type="text" name="time" placeholder="Heure" required>
    <button name="add" type="submit">Ajouter</button>
</form>

<table>
    <tr><th>Classe</th><th>Cours</th><th>Jour</th><th>Heure</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM schedules");
    while($r = $result->fetch_assoc()) {
        echo "<tr>
                <td>".htmlspecialchars($r['class_name'])."</td>
                <td>".htmlspecialchars($r['course'])."</td>
                <td>".htmlspecialchars($r['day'])."</td>
                <td>".htmlspecialchars($r['time'])."</td>
              </tr>";
    }
    ?>
</table>

</div></div></body></html>
