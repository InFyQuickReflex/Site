<?php
include("../include/auth.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/menu_principal.css" />
        <title> Accueil Administrateur </title>
    </head>
    
    <body>
    	<header> 
			<p class="logo"> <img src="../img/infy2.png" alt="logo InFy" class="img_logo"> </br> by InFy Corporation </p>
			
			<!--<nav>
                <ul id="menu">
                    <li><a href="menu_principal_fr.php">Accueil</a></li>
                    <li><a href="notre_produit_fr.php">Notre Produit</a></li>
                </ul>
			</nav>-->
			
            <figure>
                <img src="logoprofil2.png" alt = "logo profil" id="tof">
                <figcaption id="monprofil"><a href="profil_utilisateur_fr.php" id="monprofil"> Mon profil</a></figcaption>
                <a href="../include/logout.php">Déconexion</a>
			</figure>
			
			<nav>
                <ul id="langue">
                    <li><a href=""><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href="../en/menu_admin_en.php"><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
    	</header>

    	<h1>Bienvenue <?php echo $_SESSION['username']; ?>! </h1>
    	<div id="conteneur">
			<div id="interieur" class="button">
                <a href="#"><p>Gérer les capteurs</p></a>
            </div>

		    <div id="interieur" class="button">
				<a href="droit_acces_fr.php"><p>Gérer les droits d'accès</p></a>
            </div>
            
			<div id="interieur" class="button">
				<a href="faq_fr.php"><p>Accéder à la FAQ</p></a>
			</div>
		</div>

    	<footer>
        	<p class = "CGU"> Mentions légales: </p>
        	<nav>
          		<ul id="footer">
            		<li> <a href='#'> Nous contacter </a> </li>
            		<li> <a href='faq_fr.php'> FAQ </a> </li>
          		</ul>
        	</nav>
        </footer>
    </body>
</html>

