<?php
try{
  $bdd = new PDO('mysql:host=localhost;dbname=myfestivalbdd;charset=utf8', 'root', '');
}
catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}

if (isset($_POST['valid'])) {
  $username = trim(htmlspecialchars($_POST['username']));
  $email = trim(htmlspecialchars($_POST['email']));
  $password = trim(htmlspecialchars($_POST['password']));
  $password_confirm = trim(htmlspecialchars($_POST['password_confirm']));
  $phone_number = trim(htmlspecialchars($_POST['phone_number']));
  $ok = "";

  $users = $bdd->query('SELECT username FROM users WHERE username ="'.$username.'"');
  while ($user_content = $users->fetch()) {
      $ok = "ko";
  }

  if (!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password_confirm']) AND !empty($_POST['phone_number'])) {

    $pseudolenght = strlen($username);
    if ($pseudolenght <= 255) {
      if ($ok != "ko") {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if (strlen($password) >= 6) {
            if ($password == $password_confirm) {
              $password_crypted = password_hash($password, PASSWORD_DEFAULT);
              $users = $bdd->prepare('INSERT INTO users(username, email, password) VALUES(?, ?, ?)');
              $users->execute(array($username, $email, $password_crypted));
              header('Location: profile.php');
              exit();
            }else {
              $error = "Vos mots de passe ne sont pas identiques.";
            }
          }else {
            $error = "Votre mot de passe doit contenir au moins 6 caractères.";
          }
        }else {
          $error = "Votre adresse mail n'est pas valide.";
        }
      }else {
        $error = "Ce pseudo est déjà utilisé.";
      }
    }else {
       $error = "Votre pseudo doit faire moins de 255 caractères.";
     }
  } else {
    $error = "Tous les champs doivent être completés !";
    }
}
if(isset($_POST['login'])){
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
    <title>Créer un compte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style_register.css">
  </head>
  <body>
    <div class="header">
    <a href="../festivals.php" class="home">home</a>
<img src="../pictures/MYF.png" class="logo" alt="">
<a class="register" href="registration/register.php">Se connecter <br> Créer un compte</a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 inline">
          <div class="col-xl-6 col-xs-12">
                <h3>S'inscrire</h3>
    <form class="new" action="" method="post">
        <div class="input-group">
      <label for="username">pseudo</label>
      <input type="text" name="username" id="username" value="<?php if (isset($username)) { echo $username;  } ?>"> <br>
    </div>
        <div class="input-group">
      <label for="email">email</label>
      <input type="email" name="email" id="email" value="<?php if (isset($email)) { echo $email;  } ?>"> <br>
    </div>
        <div class="input-group">
      <label for="password">mot de passe</label>
      <input type="password" name="password" id="password"> <br>
    </div>
        <div class="input-group">
      <label for="password_confirm">confirmer votre mot de passe*</label>
      <input type="password" name="password_confirm" id="password_confirm"> <br>
      <div class="col-2">
      </div>
      <button type="submit" name="valid" value="Envoyer" class="col-7 btn btn-danger">Créer un compte</button>
      </div>
            </div>
    </form>
      <div class="col-xl-6 col-xs-12">
        <h3>Se connecter</h3>
<form class="connect" action="" method="post">
  <div class="input-group">
  <label for="username">pseudo</label> : <input type="text" name="username" id="username"> <br>
  </div>
  <div class="input-group">
  <label for="password">mot de passe</label> : <input type="password" name="password" id="password"> <br>
  </div>
  <div class="col-2"></div>
  <button type="submit" name="login" class="col-7 btn btn-primary">Se connecter</button>
</form>
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
