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
      <?php include("header_footer/header.php")
      include('../php_fr/connexionbdd.php');?>

      <main>
      <h1>Consultez la FAQ !</h1>
        <?php
        $req = $bdd->query('SELECT * FROM FAQ');
        $donnees = $req->fetch();
        foreach ($faq as $el){
          $id= $el['id_FAQ'];
          $reponse = $el['reponse'];
          $question = $el['question'];
        }
        ?>

        <div class=<?=$question?>>    
        <button class="accordion" onClick="BasculerAffichage('<?=$rep?>');">
          <h3><?=$key['Question']?></h3>
        </button>
        </div>


      <script src="../css/faq.js"></script>
      <?php include("header_footer/footer.php")?>
    </body>
</html>