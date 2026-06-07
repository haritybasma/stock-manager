<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock Manager</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<aside class="sidebar">
  <div class="logo">
    <span>📦</span> StockApp
  </div>
  <a href="index.php" class="<?= $page=='index.php'?'active':'' ?>">
    <span class="icon">🏠</span> Accueil
  </a>
  <a href="ajouter.php" class="<?= $page=='ajouter.php'?'active':'' ?>">
    <span class="icon">➕</span> Ajouter
  </a>
</aside>

<main class="main">
