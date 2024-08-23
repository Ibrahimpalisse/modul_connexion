<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=module_connexion;", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit();
}

if (isset($_POST['ok'])) {
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $cofpassword = $_POST['confirm-password'];
    
    if ($password !== $cofpassword) {
        echo"Les mots de passe ne correspondent pas.";
    } else {
        $requete = $bdd->prepare('INSERT INTO utilisateur(login, prenom, nom, password, role) VALUES(?, ?, ?, ?, ?)');
        $requete->execute(array($login, $prenom, $nom, $password, 'user'));
        header('Location: connexion.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mdul.css">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <!-- <img src="inscription.jpeg" alt=""> -->
    <form action="inscription.php" method="post">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" placeholder="Entrez votre login" required><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required><br>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required><br>
        <label for="confirm-password">Confirmer le mot de passe :</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmez le mot de passe" required><br>
        <input type="submit" value="Inscription" name="ok">
    </form>
</body>
</html>
