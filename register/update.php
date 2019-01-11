<?php
  session_start();
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=myfestivalbdd;charset=utf8', 'root', '');
    // $bdd = new PDO('mysql:host=marguerirn181199.mysql.db;dbname=marguerirn181199;charset=utf8', 'marguerirn181199', 'Emmanuel2702');
  }
  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }

  if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $users = $requser->fetch();

   if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']) AND $_POST['pseudo'] != $users['username']) {
     $pseudolenght = strlen($pseudo);
     if ($pseudolenght <= 255) {
         $pseudo = trim(htmlspecialchars($_POST['pseudo']));
         $insertpseudo = $bdd->prepare("UPDATE users SET username = ? WHERE id = ?");
         $insertpseudo->execute(array($username, $_SESSION['id']));
         header('Location: profile.php?id='.$_SESSION['id']);
       }else {
       $error = "Votre pseudo doit faire moins de 255 caractères.";
     }
   }
   if(isset($_POST['email']) AND !empty($_POST['email']) AND $_POST['email'] != $users['email']) {
       if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $email = trim(htmlspecialchars($_POST['email']));
         $insertmail = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
         $insertmail->execute(array($email, $_SESSION['id']));
         header('Location: profile.php?id='.$_SESSION['id']);
       }else {
         $error = "Votre adresse mail n'est pas valide.";
        }
       }

   if(isset($_POST['password']) AND !empty($_POST['password']) AND isset($_POST['password_confirm']) AND !empty($_POST['password_confirm'])) {
      $password = trim(htmlspecialchars($_POST['password']));
      $password_confirm = trim(htmlspecialchars($_POST['password_confirm']));
      if (strlen($password) >= 6) {
        if($password == $password_confirm) {
          $password_crypted = password_hash($password, PASSWORD_DEFAULT);
           $insertpassword = $bdd->prepare("UPDATE users SET password = ? WHERE id = ?");
           $insertpassword->execute(array(  $password_crypted, $_SESSION['id']));
           header('Location: profile.php?id='.$_SESSION['id']);
        } else {
           $msg = "Vos mots de passe ne sont pas identiques.";
        }
      }else {
        $error = "Votre mot de passe doit contenir au moins 6 caractères.";
      }
   }
 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="../style/style_register.css">
     <title>Editer le profil</title>
   </head>
   <body>
    <h2>Compte</h2>
    <div class="container">
      <div class="row">
        <div class="col-12 inline">
          <div class="col-xl-6 col-xs-12">
    <form class="new" action="" method="post">
      <p>Mes informations</p>
              <div class="input-group">
      <label for="username">Votre nom d'utilisateur</label> : <input type="text" name="pseudo" id="username" value="<?php echo $users['username']; ?>"> <br>
    </div>
        <div class="input-group">
      <label for="email">Votre Email</label> : <input type="email" name="mail" id="email" value="<?php echo $users['email']; ?>"> <br>
    </div>
  <p>Modifier mon mot de passe</p>
        <div class="input-group">
      <label for="password">Mot de passe</label> : <input type="password" name="password" id="password"> <br>
    </div>
        <div class="input-group">
          <label for="password_confirm">Confirmer votre mot de passe</label> : <input type="password" name="password_confirm" id="password_confirm"> <br>
          <div class="col-2">
          </div>
      <button type="submit" name="valid" value="Envoyer" class="col-7 btn btn-danger">Changer mon mot de passe</button>
    </div>
    </form>
  </div>
</div>
</div>
</div>
    <?php
      if (isset($error)) {
        echo $error;
      }
    ?>
   </body>
 </html>
<?php
}
 ?>
