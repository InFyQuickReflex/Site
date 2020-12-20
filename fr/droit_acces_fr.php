<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/droit_acces.css">
        <title id="titre">Gérer les droits d'accès</title> 
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

            <div class="form">
                <p>S'identifier</p>
                <form method="post" action="" class="login"> 
                    <input type="text" name="username" placeholder = "Identifiant" required /></br>
                    <input type="password" name="password" placeholder = "Mot de Passe" required /></br>
                    <input name="submit" type="submit" value="Se connecter" /></br>
                </form>
            </div>

            <nav>
                <ul id="langue">
                    <li><a href=""><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
        </header>

        <section id=GererDroitAcces>
            <h1 class=TitreSection>Gérer les droits d'accès</h1>

            <article class=Box>
                <h2 class=Titrebox>Administrateur</h2>
                <p>
                    Nom administrateur 1 : ******<br>
                    Nom administrateur 2 : ****** <br>
                    *Autres informations*<br><br>
                    <a href='#' class=BoutonSupprimer>Supprimer</a>
                    <a href='#' class=BoutonModifier>Modifier</a>
                </p>
            </article>

            <article class=Box>
                <h2 class=Titrebox>Gestionnaire</h2>
                <p>
                    Nom gestionnaire 1 : ******<br>
                    Nom gestionnaire 2 : ****** <br>
                    *Autres informations*<br><br>
                    <a href='#' class=BoutonSupprimer>Supprimer</a>
                    <a href='#' class=BoutonModifier>Modifier</a>
                </p>
            </article>
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

