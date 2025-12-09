<?php
session_start();
include "includes/db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "includes/header.php";
include "includes/sidebar.php";
?>

<div class="content">
    <h2>Bienvenue dans le panneau administratif</h2>
    <p>Utilisez le menu pour gérer les utilisateurs, les emplois du temps et les rapports.</p>

    <div class="card-grid">
        <a href="users.php" class="card">Gestion des utilisateurs</a>
        <a href="schedules.php" class="card">Emplois de temps</a>
        <a href="reports.php" class="card">Rapports</a>
    </div>
</div>

</div></div></body></html>
