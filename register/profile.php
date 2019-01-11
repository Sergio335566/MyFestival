<?php
  session_start();
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=myfestivalbdd;charset=utf8', 'root', '');
    // $bdd = new PDO('mysql:host=marguerirn181199.mysql.db;dbname=marguerirn181199;charset=utf8', 'marguerirn181199', 'Emmanuel2702');
  }
  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
  $_GET['id'] = $_SESSION['id'];
  if (isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $req = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute(array($getid));
    $users = $req->fetch();
 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="style/style_index.css">
     <link rel="stylesheet" href="style/style_header.css">
     <title>Profil</title>
   </head>
   <body>
     <div class="container">
     <div class="row">

    <h2 class="col-12">Bonjour, <?php echo $users['username']; ?> </h2>
    <p class="col-12">Votre pseudo: <?php echo $users['username']; ?></p>
    <p class="col-12"> Votre e-mail : <?php echo $users['email']; ?> </p>
    <p class="col-12">Numéro de téléphone : <?php echo $users['phone_number']; ?> </p>
    <?php
      if (isset($_SESSION['id']) AND $_SESSION['id'] == $users['id']) {
    ?>
        <a class="col-12" href="update.php?id=<?php echo $_SESSION['id'];?>">Paramètres</a>
        <a  class="col-12" href="logout.php ">Deconnexion</a>
    <?php }
    ?>
    </div>
       </div>
   </body>
 </html>
<?php
}
 ?>
