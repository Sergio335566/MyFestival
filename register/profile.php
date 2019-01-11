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
     <title>Profil</title>
   </head>
   <body>
    <h2>Profil de <?php echo $users['username']; ?> </h2>
    <p>Pseudo : <?php echo $users['username']; ?></p>
    <p>Mail : <?php echo $users['email']; ?> </p>
    <?php
      if (isset($_SESSION['id']) AND $_SESSION['id'] == $users['id']) {
    ?>
        <a href="update.php?id=<?php echo $_SESSION['id'];?>">Paramètres</a>
        <a href="logout.php ">Deconnexion</a>
    <?php }
    ?>
   </body>
 </html>
<?php
}
 ?>
