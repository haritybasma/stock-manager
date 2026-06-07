<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom      = $_POST['nom'];
    $quantite = $_POST['quantite'];
    $prix     = $_POST['prix'];

    $pdo->prepare("INSERT INTO produits (nom, quantite, prix) VALUES (?, ?, ?)")
        ->execute([$nom, $quantite, $prix]);

    header("Location: index.php");
    exit;
}

include 'header.php';
?>

<div class="page-header">
  <div>
    <h1>Ajouter un produit</h1>
    <p>Remplissez les informations ci-dessous</p>
  </div>
</div>

<div class="form-wrap">
  <a href="index.php" class="back-link">← Retour à la liste</a>

  <div class="form-card">
    <form method="POST">

      <div class="form-group">
        <label>Nom du produit</label>
        <input type="text" name="nom" placeholder="Ex : Stylo noir" required>
      </div>

      <div class="form-group">
        <label>Quantité</label>
        <input type="number" name="quantite" placeholder="Ex : 50" min="0" required>
      </div>

      <div class="form-group">
        <label>Prix unitaire (DH)</label>
        <input type="number" name="prix" placeholder="Ex : 12.50" step="0.01" min="0" required>
      </div>

      <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center;">
        ✅ Enregistrer le produit
      </button>

    </form>
  </div>
</div>

</main>
</body>
</html>
