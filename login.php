<?php
// Démarrer une session PHP
session_start();

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['username'])) {
    header("Location: compte.php");
    exit();
}

// Gestion de la connexion
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Exemple de validation (à remplacer par une base de données réelle)
    $valid_username = "user";
    $valid_password = "password123";

    if ($username === $valid_username && $password === $valid_password) {
        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['username'] = $username;

        // Redirection vers la page compte ou autre
        header("Location: compte.php");
        exit();
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>PROBEATS</h1>
        </div>
        <nav>
            <a href="index.html">Accueil</a>
            <a href="produits.html">Produits</a>
            <a href="a-propos.html">À propos</a>
            <a href="assistance.html">Assistance</a>
            <a href="compte.php">Compte</a>
        </nav>
    </header>

    <main id="login">
        <div class="login-container">
            <h2>Connexion</h2>
            <?php if (!empty($error_message)): ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>
                <button type="submit" class="btn">Se connecter</button>
            </form>
            <p class="register-link">Pas encore de compte ? <a href="register.php">Inscrivez-vous ici</a>.</p>
        </div>
    </main>

    <footer>
        <p>© 2024 PROBEATS. Tous droits réservés.</p>
    </footer>
</body>
</html>
