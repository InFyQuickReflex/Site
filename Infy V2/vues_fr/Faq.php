<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FAQ - Utilisateur</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/stylefaq.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head> 

    <body> 
      <?php include("header_footer/header.php");
      include('../controleur_fr/connexionbdd.php');
      include('../controleur_fr/fonctions/fonctions_faq.php');?>

      <main>
        <br><br>
        <h1>Consultez la FAQ !</h1>
        <?php
        $req = SelectFaqUser($bdd);
        while($donnees = $req->fetch())
        {
          echo '<button class="accordion">
          <h3>'.$donnees['question_fr'].'</h3>
          </button>
          <div class="panel">'   
          .$donnees['reponse_fr'].'</div>';
        }?>
      </main>
      <script src="../css/faq.js"></script>
      <?php include("header_footer/footer.php")?>
    </body>
</html>

