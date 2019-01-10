<?php
require_once('config/functions.php');
$housings = getHousings();
$festival = getFestival();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>MyFestival</title>
  </head>
  <body>
    <a href="registration/register.php">Créer un compte / Se connecter</a>
    <div class="container">
      <div class="row">


    <h1>Les annonces :</h1>
    <?php foreach($housings as $housing): ?>
      <div class="col-12 posts">
      <h3> <?= $housing->title ?></h3>
      <p> <?= $housing->author ?></p>
      <p> <?= $housing->content ?></p>
      <time><?= $housing->date ?></time>
      </div>
      <br>
      <br>
      <a href="festival.php?id=<?= $festival->id ?>">Lire la suite</a>
    <?php  endforeach; ?>
        </div>
    </div>
  </body>
</html>
