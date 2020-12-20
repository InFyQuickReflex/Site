<?php require('../include/db_register.php');
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8"/>
    	<link rel="stylesheet" href="../css/creer_utilisateur.css"/>
    	<title>Gestionnaire:Créer un nouvel utilisateur</title>
    </head>

    <body>
    	<header> 
        <p class="logo"> <img src="../img/infy2.png" alt="logo InFy" class="img_logo"> </br> by InFy Corporation </p>
   			<nav>
				<ul id="menu">
    				<li><a href="menu_principal_fr.php">Accueil</a></li>
    				<li><a href="notre_produit_fr.php">Notre Produit</a></li>
    			</ul>
			</nav>

			<figure>
				<img src="logoprofil2.png" alt = "logo profil" id="tof">
				<figcaption id="monprofil"><a href="profil_utilisateur_fr.php" id="monprofil">Mon profil</a></figcaption>
				<a href="../include/logout.php">Déconnexion</a>
			</figure>

        	<nav>
                <ul id="langue">
                    <li><a href=""><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
    	</header>

    	<section>
    		<form method="post" action="" name = "registration" class="Création">
    			<p> 
                    <label for="username"> Identifiant:</label>
                    <input type="text" name="username" required /> <br/>

                    <label for="name"> Nom:</label>
                    <input type="text" name="nom" required /> <br/>

                    <label for="surname"> Prénom:</label>
                    <input type="text" name="prenom" required /><br/>

                    <label for="mail"> Adresse mail:</label>
                    <input type="email" name="email" required /> <br/>

                    <label for="pass"> Mot de passe:</label>
                    <input type="password" name="password" required /> <br/>  
                    
                    <label for="birth"> Date de naissance:</label>
                    <input type="date" name="birth" id="birth" /> <br/>
                    
                    <label for="tel"> Numéro de téléphone:</label>
                    <input type="tel" name="tel" id="tel" /> <br/>

                    <select name="type" class = "type" required>
                        <option name = "user" value="utilisateur">Utilisateur</option>
                        <option name = "admin" value="admin">Administrateur</option>
                        <option name = "manager" value="gestionnaire">Gestionnaire</option>
                    </select></br>
                </p>
                    <input type="submit" name="submit" value="Créer le compte" />
               </form>
    	</section>

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
