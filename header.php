<?php if(session_status() !== PHP_SESSION_ACTIVE) session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panneau Administratif</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="header">
    <h2>Panneau Administratif</h2>
    <a href="logout.php" class="logout">Déconnexion</a>
</div>
<div class="container">
