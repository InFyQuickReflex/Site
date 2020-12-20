<!DOCTYPE html>
<html>
    <head>
        <link rel= "stylesheet" href= "../css/faq.css">
        <meta charset="utf-8">
        <title id="titre">FAQ</title>
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

        <h1> Page FAQ</h1>
        
        <div class="accordion">
            <div>
                <input type="radio" name="example_accordion" id="section1" class="accordion__input">
                <label for="section1" class="accordion__label">Question 1</label>

                <div class="accordion__content">
                    <p>Section #1</p>
                    <p>
                        Ceci est la réponse de la question 1, on peut écrire tout ce qu'on veut !
                    </p>
                </div>
            </div>

            <div>
                <input type="radio" name="example_accordion" id="section2" class="accordion__input">
                <label for="section2" class="accordion__label">Question 2</label>

                <div class="accordion__content">
                    <p>Section #2</p>
                    <p>
                        Ceci est la réponse de la question 2, on peut écrire tout ce qu'on veut !
                    </p>
                </div>
            </div>

            <div>
                <input type="radio" name="example_accordion" id="section3" class="accordion__input">
                <label for="section3" class="accordion__label">Question 3</label>

                <div class="accordion__content">
                    <p>Section #3</p>
                    <p>
                        Ceci est la réponse de la question 3, on peut écrire tout ce qu'on veut !bhjfvslkdshbkvsbvksjbfk jsdbfb skugfsiurgfsk ugfskdj  gbfksdgf
                    </p> 
                </div>
            </div>
        </div>

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

