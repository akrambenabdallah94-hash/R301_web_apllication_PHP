<h2><?= htmlspecialchars($titre) ?></h2>
<p>Identifiant de session (PHPSESSID) : <?= htmlspecialchars(session_id()) ?></p>
<p>Contenu de $_SESSION :</p>
<pre><?= htmlspecialchars($contenuSession) ?></pre>
