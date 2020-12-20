<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Gérer les capteurs</title>
		<link rel='stylesheet' href="../css/style_thomas.css">
	</head>
	<body>
	<header> 
       <p class="logo"> <img class="logo" src="LogoInFy.PNG" alt="logo InFy"> <br> by InFy Corporation </p>
   			<nav>
				<ul id="menu">
    				<li><a href="MenuPrincipal.html" target ="blank">Accueil</a></li>
    				<li><a href="NotreProduit.html">Notre Produit</a></li>
    			</ul>
			 </nav>

     		<form method="post" action="compte" class="login">
    			<p> 
      			<label for="pseudo"> Identifiant:</label>
       			<input type="text" name="pseudo" id="pseudo" /> <br />
       			<label for="pass"> Mot de passe:</label>
       			<input type="password" name="pass" id="pass" />       
   				</p>
   			</form>

        	<form method="post" action="langue" class="langue">
          		<p>
            	<label for="langue"> Choisissez une langue </label><br />
            	<select name="pays" id="pays">
              		<option value="francais">Français</option>
              		<option value="anglais">Anglais</option>     
            	</select>
          		</p>
      		</form >
    </header>
	<section id=NosCapteurs>
		<a href='#' style='font-size:15px;position:left;'>Retour au menu administrateur</a>
		<h1 class=TitreSection>Nos Capteurs</h1>	
		<article class=Capteur>
		<h2 class=TitreCapteur>Capteur 1</h2>
		Boîtier associé : 1<br>
		Type : Température <br>
		*Autres informations*<br><br>
		<a href='#' class=BoutonSupprimer>Supprimer</a>
		<a href='#' class=BoutonModifier>Modifier</a>
		</article>
		<article class=Capteur>
		<h2 class=TitreCapteur>Capteur 2</h2>
		Boîtier associé : 1<br>
		Type : Température <br>
		*Autres informations*<br><br>
		<a href='#' class=BoutonSupprimer>Supprimer</a>
		<a href='#' class=BoutonModifier>Modifier</a>
		</article>
		<article class=Capteur>
		<h2 class=TitreCapteur>Capteur 3</h2>
		Boîtier associé : 1<br>
		Type : Température <br>
		*Autres informations*<br><br>
		<a href='#' class=BoutonSupprimer>Supprimer</a>
		<a href='#' class=BoutonModifier>Modifier</a>
		</article>
	</section>
	<section id=AjouterCapteur>
	<h1 class=TitreSection>Ajouter un nouveau capteur</h1>
	<form method='post' action='traitement.php'>
	<label for='Type'>Type :</label>
	<select name='Type' id='Type'>
	<option value='Temperature'>Température</option>
	<option value='FrequenceCardiaque'>Fréquence Cardiaque</option>
	<option value='Microphone'>Microphone</option>
	</select>
	<br>
	<label for='Boitier'>Boitier associé : </label><input name='Boitier' id='Boitier' type=number>
	<br>
	*Autres champs éventuels*<br>
	<input type="submit" value="Envoyer">
	<input type="reset" value="Reset">
	</form>
	</section>
	<footer>
        	<p class = "CGU"> Mentions légales: </p>
        	<nav>
          		<ul id="footer">
            		<li> <a href='#'> Nous contacter </a> </li>
            		<li> <a href='#'> FAQ </a> </li>
          		</ul>
        	</nav>
	</footer>
	</body>
</html>
