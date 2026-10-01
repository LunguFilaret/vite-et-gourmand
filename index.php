<?php
// 1. On inclut le fichier de connexionà la base de données
require_once 'includes/db.php';
// 2. On va chercher les avis clients validés dans la base de donées
try {
    $stmtReviews = $pdo->query("SELECT * FROM reviews WHERE is_validated = 1 ORDER BY created_at DESC LIMIT 3");
    $reviews = $stmtReviews->fetchAll();
} catch (PDOException $e) {
    // Si la base de données a un problème, on prépare un table vide pour éviter les erreurs
    $reviews = [];
}
<?
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite & Gourmand - Accueil</title>
    <!-- Lien vers Bootstrap 5 pourun design propre et rapide -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
      <!-- Barre de navigation (Menu du site) -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
              <a class="navbar-brand" href="index.php>Vite & Gourmand</a>
              <div class="navbar-nav ms-auto">
                  <a class="nav-link active" href="index.php">Accueil</a>
                  <a class="nav-link"  href="menus.php">Nos Menus</a>
                  <a class="nav-link" href="contact.php">Contact</a>
                  <a class="nav-link" href="login.php">Connexion</a>
              </div>
          </div>
      </nav>
      <!-- En-tete : Présentation de l'entreprise (Julie et José à Bordeaux) -->
      <header class="bg-wite py-5 shadow-sm text-center">
           <div class="container">
               <h1 class="display-4 fw-bold text-dark">Vite & Gourmand</h1>
               <p class="lead text-muted mt-3 mx-auto" style="max-width: 800px;">"Vite & Gourmand" est une entreprise constituée de deux personnes, Julie et José. Elle existe depuis 25 ans à Bordeaux, et propose leurs prestations pour tout événement àtravers un menu en constante évolution[span_2](start_span)[span_2](end_span).
               </p>
               <p class="text-secondary">Afin d'accroitre leur visibilité et de proposer leurs menus facilement à tous et toutes, l'équipe s'associe à FastDev pour vous confier le développement de cette application web de qualité[span_3](start_span)[span_3](end_span).
               </p>
               <a href="menus.php" class="btn btn-primary btn-lg mt-3">Découvrir nos menus</a>
          </div>
      </header>
    <!-- Section principale : Affichage dynamique des avis clients validés -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Ce que nos clients disent de nous</h2>
        <div class="row">
            <?php if (!empty($reviews)): ?>
                <!-- S'il y a des avis, on les affiche un par un avec une boucle foreach -->
                <?php foreach ($reviews as $reviews): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?=htmlspecialchars($review['author_name'] ??'Client') ?></h5>
                                <p class="card-text text-muted">"<?= htmlspecialchars($review['comment']) ?>"</p>
                                <p class="text-warning mb-0 fw-bold">Note : <?= htmlspecialchars($review['rating']) ?>/5</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Si la base estvide ou aucun avis n'est validé -->
                <div cjass="col-12 text-center">
                    <p class="text-muted">Aucun avis validé pourle moment.</p>
                </div>
            <?php endif; ?>
         </div> 
     </main>

     <!-- Pied de page (Footer) conforme aux exigences légales et horaires -->
     <footer class="bg-dark text-white text-center py-4">
         <div class="container">
             <p class="mb-1">Horaires : Ouvert du lundi au dimanche[span_4](start_span)[span_4](end_span).</p>
             <p class="small mb-3">
                 <a href="mentions-legales.php" class="text-white text-decoration-underline">Mentions légales</a>
                 <a href="cgv.php" class="text-white text-decoration-underline">Conditions Générales de Vente (CGV)</a>[span_5](start_span)[span_5](end_span)
             </p>
             <p class="mb-0 text-muted">&copy; 2026 Vite & Gourmand - Tous droits réservés.</p>
         </div>
     </footer>
      
</body>
</html>


  
