<?php
require 'config.php';
$produits = $pdo->query("SELECT * FROM produits")->fetchAll();

$total     = count($produits);
$valeur    = array_sum(array_map(fn($p) => $p['quantite'] * $p['prix'], $produits));
$alertes   = count(array_filter($produits, fn($p) => $p['quantite'] < 5));

include 'header.php';
?>

<div class="page-header">
  <div>
    <h1>Tableau de bord</h1>
    <p>Gérez votre inventaire facilement</p>
  </div>
  <a href="ajouter.php" class="btn btn-primary">+ Ajouter un produit</a>
</div>

<div class="stats">
  <div class="stat-card">
    <div class="label">Total produits</div>
    <div class="value accent"><?= $total ?></div>
  </div>
  <div class="stat-card">
    <div class="label">Valeur du stock</div>
    <div class="value"><?= number_format($valeur, 2) ?> DH</div>
  </div>
  <div class="stat-card">
    <div class="label">Alertes stock faible</div>
    <div class="value danger"><?= $alertes ?></div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h2>Liste des produits</h2>
  </div>
  <table>
    <thead>
      <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>État</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($produits as $p): ?>
      <?php
        if ($p['quantite'] == 0)     $badge = ['badge-out', 'Rupture'];
        elseif ($p['quantite'] < 5)  $badge = ['badge-low', 'Faible'];
        else                          $badge = ['badge-ok',  'OK'];
      ?>
      <tr>
        <td><strong><?= htmlspecialchars($p['nom']) ?></strong></td>
        <td><?= $p['quantite'] ?></td>
        <td><?= number_format($p['prix'], 2) ?> DH</td>
        <td><span class="badge <?= $badge[0] ?>"><?= $badge[1] ?></span></td>
        <td>
          <a href="supprimer.php?id=<?= $p['id'] ?>"
             class="btn btn-ghost"
             onclick="return confirm('Supprimer ce produit ?')">🗑 Supprimer</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php if (empty($produits)): ?>
      <tr><td colspan="5" class="empty">Aucun produit pour l'instant.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</main>
</body>
</html>
