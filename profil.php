<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header('Location: connexion.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=module_connexion;", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit(); // Sortir si la connexion échoue
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    if ($login != "" && $prenom != "" && $nom != "" && $password != "") {
        try {
            $update = $bdd->prepare("UPDATE utilisateur SET login = :login, prenom = :prenom, nom = :nom, password = :password WHERE id = :id");
            $update->execute(array(
                ':login' => $login,
                ':prenom' => $prenom,
                ':nom' => $nom,
                ':password' => $password,
                ':id' => $user_id
            ));
            echo "Les informations ont été mises à jour avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }
}

$req = $bdd->prepare("SELECT * FROM utilisateur WHERE id = :id");
$req->execute(array(':id' => $user_id));
$user = $req->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <title>Profil</title>
</head>
<body>
    <h1>Profil de <?php echo htmlspecialchars($user['login']); ?></h1>
    <form action="" method="post">
         <a href="index.php">accueil</a>

        <label for="login">Login :</label>
        <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($user['login']); ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required><br>

        <input type="submit" value="Mettre à jour">
    </form>
    <section>
       
    </section>
</body>
</html>
