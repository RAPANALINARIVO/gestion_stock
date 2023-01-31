<?php
// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=gestion_stock", "root", "");
// Définir le nombre de produits à afficher par page
$itemsPerPage = 5;

// Déterminer le numéro de page actuel
$currentPage = (isset($_GET['page']) && !empty($_GET['page'])) ? intval($_GET['page']) : 1;

// Calculer le nombre total de produits
$totalProducts = $pdo->query("SELECT COUNT(*) FROM stock")->fetchColumn();

// Calculer le nombre total de pages
$totalPages = ceil($totalProducts / $itemsPerPage);

// Déterminer les produits à afficher sur la page actuelle
$offset = ($currentPage - 1) * $itemsPerPage;
$products = $pdo->query("SELECT * FROM stock LIMIT $offset, $itemsPerPage")->fetchAll();

// Afficher les produits
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Nom</th>';
echo '<th>Prix</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($products as $product) {
    echo '<tr>';
    echo '<td>' . $product['id_prod'] . '</td>';
    echo '<td>' . $product['nom_prod'] . '</td>';
    echo '<td>' . $product['quantite_prod'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

// Afficher la pagination
echo '<nav aria-label="Page navigation">';
echo '<ul class="pagination">';
for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $currentPage) {
        echo '<li class="active"><a href="#">' . $i . '</a></li>';
    } else {
        echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
    }
}
echo '</ul>';
