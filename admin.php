<?php
session_start();
if (!isset($_SESSION['user_id'])){
 exit();
}
    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
</head>
<body>
    <h1>Bienvenue sur la page Admin</h1>
    <?php
    $la_base = mysqli_connect("localhost", "root", "", "module_connexion");
    $selections = mysqli_query($la_base, "SELECT * FROM utilisateur");
    $result = mysqli_fetch_assoc($selections);
echo 
        "<table border=2>
            <thead>
                    <th>
                      login
                    </th>
                    <th>
                      prenom
                    </th>
                    <th>
                      nom
                    </th>
                    <th>
                     password 
                    </th>      
            </thead>
            <tbody>";
                foreach ($selections as $user) {
                    echo "<tr>";
                        echo "<td>" . $user['login'] . "</td>";
                        echo "<td>" . $user['prenom'] . "</td>";
                        echo "<td>" . $user['nom'] . "</td>";
                        echo "<td>" . $user['password'] . "</td>";
                        echo "</tr>";
                    }
                echo "</tbody>
            </table>"; 

            $la_base->close()
?>              
        



</body>
</html>
