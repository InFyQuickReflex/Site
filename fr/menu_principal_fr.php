<?php require('../include/db_login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/menu_principal.css" />
        <title>Quick Reflex - Tests Psychotechniques</title>
    </head>

    <body>
    	<header> 
        <p class="logo"> <img src="Logos/LogoInFyTransp.png" alt="logo InFy"> </br> by InFy Corporation </p>

   			<nav>
				  <ul id="menu">
    				<li><a href="">Accueil</a></li>
    				<li><a href="notre_produit_fr.php" target="blank">Notre Produit</a></li>
    			</ul>
        </nav>

        <div class="form">
          <p>S'identifier</p>
          <form method="post" action="" class="login"> 
       			<input type="text" name="username" placeholder = "Identifiant" required /></br>
       			<input type="password" name="password" placeholder = "Mot de Passe" required /></br>
            <input name="submit" type="submit" value="Login" /></br>
   			  </form>
        </div>

        <nav>
        <ul id="langue">
          <li><a href=""><img src="../img/ic_fr.png" class="icone"></a></li>
          <li><a href="../en/notre_produit_en.php"><img src="../img/ic_en.png" class="icone"></a></li>
        </ul>
      </nav>
    	</header>

      <div class="photofond">
        <div class="description"> 
          Testez-vous avec Quick Reflex!
        </div>
      </div>

    	<section>
    		<article class ="InFy">
    			<h3> Innovation For You ! </h3>
    			<p> Afin de répondre à la demande de notre client, Infinite Measures, concernant des tests psychotechniques, notre entreprise InFy Corp a décidé de concevoir et fournir des boitiers permettant de tester la réactivité des pilotes de Formule 1. </br>
          En effet, nous avons remarqué que de nos jours, les tests faits aux apprentis pilotes de courses n’étaient pas assez développés, les pilotes se préparaient uniquement avec un petit test de lâcher de balle, où ils devaient rattraper une balle qui tombait, le plus rapidement possible. </br>
				  C’est pourquoi nous avons décidé de nous occuper de la création de tests, permettant de juger la réactivité de pilotes de courses afin de détecter s’ils sont aptes ou non à monter dans une voiture et conduire. </br>
				  L’utilisateur devra d’abord se rendre dans un des centres d’évaluation afin de s’inscrire pour passer un nouveau test. Il recevra ensuite un boîtier et devra s’installer devant un ordinateur, où il précisera son numéro de boîtier, afin de pouvoir suivre en temps réel l’avancée de ses tests. </br>
          </p>
        </article>

        <article class = "Test">
          <h3> Passer un test </h3>
          <p> Pour effectuer un test, vous devrez dans un premier temps accéder à un centre d'évaluation afin de vous inscrire. Vous recevrez par la suite un boitier, dont vous pouvez consulter le fonctionnement dans la rubrique "Notre métier". Enfin, il vous restera simplement à vous installer devant un ordinateur, où vous devrew préciser le numéro de boitier, afin de pouvoir suivre en temps réel l'avancée de votre test. 
				  </p>
			 </article>

			 <aside>
				  <h3> Notre équipe </h3>
          Notre équipe est composée de 6 ingénieurs:
          <ul>
            <li> Yanouri Lina </li></br>
            <li> Lacroix Marguerite</li></br>
            <li> Desailly Jérémy </li></br>
            <li> Herembert Malo </li></br>
            <li> Tran Ba Tho Guillaume </li></br>
            <li> Raboteau Thomas </li></br>
          </ul>
			 </aside>
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
