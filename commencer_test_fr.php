<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Commencer un test</title>
        <link rel="stylesheet" href="../css/commencer_test.css">
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
                    <li><a href="..//en/menu_principal_en.php"><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
        </header>

        <main>
            <form method="post" action="timer_fr.php" class="test_start">
                <p>
                    <label for="num_boitier">Numéro boitier : </label><input type="text" name= "num_boitier" id="num_boitier" required><br>
                    <input type="submit" value="Commencer le test" class="button">
                </p>
            </form>
        </main>

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
