<?php
try{
  $bdd = new PDO('mysql:host=localhost;dbname=myfestivalbdd;charset=utf8', 'root', '');
  // $bdd = new PDO('mysql:host=marguerirn181199.mysql.db;dbname=marguerirn181199;charset=utf8', 'marguerirn181199', 'Emmanuel2702');
}
catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}

if (isset($_POST['valid'])){
  if (isset($_POST['username']) AND isset($_POST['password'])) {
    if (!empty($_POST['username']) AND !empty($_POST['password'])) {
      $username = htmlspecialchars($_POST['username']);
      $password = htmlspecialchars($_POST['password']);

        $req = $bdd->prepare('SELECT id, password FROM users WHERE username = ?');
        $req->execute(array($username));
        $resultat = $req->fetch();

        $isPasswordCorrect = password_verify($password, $resultat['password']);

        if (!$resultat){
          $error = 'Mauvais identifiant et/ou mot de passe !';
        } else{
          if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['username'] = $username;
            $error =  'Vous êtes connecté !';
            header("Location: profile.php?id=".$_SESSION['id']."");
            exit();
          }else {
            $error =  'Mauvais identifiant et/ou mot de passe !';
            }
        }
    }
  }else {
    $error = "Erreur";
  }
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Se connecter</title>
  </head>
  <body>
    <p>Pas encore de compte ? <a href="register.php">Inscrivez vous !</a></p>
    <h1>S'inscire</h1>
    <form class="" action="" method="post">
      <label for="username">pseudo</label> : <input type="text" name="username" id="username"> <br>
      <label for="password">mot de passe</label> : <input type="password" name="password" id="password"> <br>
      <input type="submit" name="valid" value="Envoyer">
    </form>

<?php
  if (isset($error)) {
    echo $error;
  }
?>
  </body>
</html>
