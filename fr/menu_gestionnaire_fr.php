<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/menu_gestionnaire.css"/>
        <title>Gestionnaire:accueil</title>
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
                <figcaption id="monprofil"><a href="profil_utilisateur_fr.php" id="monprofil"> Mon profil</a></figcaption>
                <a href="">Déconexion</a>
			</figure>

			<nav>
				<ul id="langue">
					<li><a href=""><img src="../img/ic_fr.png" class="icone"></a></li>
					<li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
				</ul>
			</nav>
    	</header>

    	<section>
    		<p><h1>(Nom Prénom) Bienvenue !</h1><br/>

    		<label for="search">Recherche un utilisateur:</label>
            <input type="search" id="search" name="q" aria-label="Search through site content">

            <button>Search</button>

    		</p>
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
