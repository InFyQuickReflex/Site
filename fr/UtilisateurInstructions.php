<!DOCTYPE html>
<html>
	<head>
	<meta charset='utf-8'>
	<title>Instructions Test</title>
	<link rel='stylesheet' href='../css/style_thomas.css'>
	</head	>
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
	<section id=FinTest>
	<p class=FinTestGauche>Boitier n°3</p>
	<p class=FinTestDroite>Nom Prénom</p>
	<p id=FinTestPrincipal>*Instructions du test en cours*<br>
	
	<p class=FinTestBasGauche>Date</p>
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
