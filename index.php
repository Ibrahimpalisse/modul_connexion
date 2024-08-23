<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="a0">
            <h1 class="titre">
               ma passion
            </h1>
            <?php
                session_start();
                if (isset($_SESSION['user_id'])): ?>
                    <a class="a1" href="profil.php">Voir votre profil</a>
                    <a class="a1" href="deconnexion.php">Déconnexion</a>
                <?php else: ?>
                    <a class="a1" href="inscription.php">Inscription</a>
                    <a class="a1" href="connexion.php">Connexion</a>
                <?php endif; ?>
        </nav>
    </header>
    <main>
  
       
<section class="parti1">
  
        <div>
            <a href=""><img src="image/romon1.PNG"></a>
        </div>

        <div>
            <a href=""><img src="image/roman2.PNG"></a>
        
        </div>

        <div>
            <a href=""><img src="image/roman3.PNG"></a>
        </div>

        <div>
            <a href=""><img src="image/romman16.PNG"></a>
        </div> 
</section>
<section class="parti1">
        <div>
            <a href=""><img src="image/roman10.PNG"></a>
        </div>

        <div>
            <a href=""><img src="image/roman11.PNG"></a>
        
        </div>

        <div>
            <a href=""><img src="image/roman12.PNG"></a>
        </div>

        <div>
            <a href=""><img src="image/roman13.PNG"></a>
        </div> 
</section>
<section class="parti1">
        <div>
            <a href=""><img src="image/roman15.PNG"></a>
        </div>

        <div>
            <a href=""><img src="image/roman8.PNG"></a>
        
        </div>

        <div>
            <a href=""><img src="image/romman6.PNG"></a>
        </div>

        <div>
            <a href=""><img src="image/roman9.PNG"></a>
        </div> 
</section>
<section class="parti1">
        <div>
            <a href=""><img src="image/roman4.PNG"></a>
        </div>

        <div>
            <a href=""><img src="image/roman5.PNG"></a>
        
        </div>

        <div>
            <a href=""><img src="image/dao_.jpeg"></a>
        </div>

        <div>
            <a href=""><img src="image/romman16.PNG"></a>
        </div> 
</section>
<section class="parti1">
        <div>
            <a href=""><img src="image/cera.png"></a>
        </div>

        <div>
            <a href=""><img src="image/lorde.png"></a>
        
        </div>

        <div>
            <a href=""><img src="image/roman7.PNG"></a>
        </div>

        <div>
            <a href=""><img src="image/empere.png"></a>
        </div> 
</section>
   

    