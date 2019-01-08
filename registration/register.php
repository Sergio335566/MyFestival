<?php
try {
$connect = new PDO ("mysql:host=localhost;dbname=myfestival", "root", "");
}
catch(PDOException $e)
{
  echo "error".$e->getMessage();
}
if(isset($_POST['register'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $insert = $connect->prepare("INSERT INTO users (username, email, password)
  values(:username,:email,:password) ");

  $insert->bindParam(':username' ,$username);
  $insert->bindParam(':email' ,$email);
  $insert->bindParam(':password' ,$password);
  $insert->execute();
}elseif(isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $select = $connect->prepare("SELECT * FROM users WHERE email='$email' and password='$password'");
  $select->setFetchMode(PDO::FETCH_ASSOC);
  $select->execute();
  $data=$select->fetch();

  if ($data['email']!=$email and $data['password']!=$password) {
    echo "Email ou mot de passe incorrect.";
  }
  elseif ($data['email']==$email and $data['password']==$password) {
    $_SESSION['email']=$data['email'];
    $_SESSION['username']=$data['username'];
    header("location:profile.php");
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <a href="../index.php">retour à l'accueil</a>
    <div class="header">
      <h2>Créer un compte</h2>
    </div>
    <form class="" method="post">
        <div class="input-group">
          <label>Entrez un nom d'utilisateur</label>
          <input type="text" name="username" value="">
        </div>
        <div class="input-group">
          <label>Entrez un email</label>
          <input type="text" name="email" value="">
        </div>
        <div class="input-group">
          <label>Entrez un mot de passe</label>
          <input type="password" name="password" value="">
        </div>
        <div class="input-group">
          <button type="submit" name="register" class="btn">Créer un compte</button>
        </div>
    </form>
    <form class="" method="post">
        <div class="input-group">
          <label>Email</label>
          <input type="text" name="email" value="">
        </div>
        <div class="input-group">
          <label>Mot de passe</label>
          <input type="password" name="password" value="">
        </div>
        <div class="input-group">
          <button type="submit" name="login" class="btn">se connecter</button>
        </div>
    </form>
  </body>
</html>
