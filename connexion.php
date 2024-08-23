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
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    if ($login != "" && $password != "") {
        $requte = $bdd->prepare("SELECT * FROM utilisateur WHERE login = :login AND password = :password");
        $requte->execute(array(':login' => $login, ':password' => $password));
        $rep = $requte->fetch(PDO::FETCH_ASSOC);

        if ($rep) {
            $_SESSION['user_id'] = $rep['id'];
            if ($rep['role'] == 'admin') {
                header('Location: admin.php'); // Redirection vers la page admin
            } else {
                header('Location: profil.php'); // Redirection vers la page utilisateur
            }
            exit();
        } else {
            echo "Login ou mot de passe incorrect";
        } 
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mdul.css">
    <title>Connexion</title>
</head>
<body class="page_connexion">
    <h1 class="titre">Connexion</h1>
    <form action="connexion.php" method="post">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" placeholder="Entrez votre login" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
        <input type="submit" value="Se connecter" name="ok">
    </form>
</body>
</html>
