<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pagetitle) ?></title>
    <link rel="stylesheet" href="/TD6/src/assets/css/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="frontController.php?controller=voiture&amp;action=readAll">Voitures</a></li>
            <li><a href="frontController.php?controller=utilisateur&amp;action=readAll">Utilisateurs</a></li>
            <li><a href="frontController.php?controller=trajet&amp;action=readAll">Trajets</a></li>
        </ul>
    </nav>
</header>
<main>
    <?php require __DIR__ . "/{$cheminVueBody}"; ?>
</main>
<footer>
    <p>Site de Covoiturage 100% Made in France</p>
</footer>
</body>
</html>
