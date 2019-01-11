<?php
require_once('config/functions.php');
$festivals = getFestivals();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <div class="header">
    <a href="festivals.php" class="home">home</a>
<img src="pictures/MYF.png" class="logo" alt="">
<a class="register" href="registration/register.php">Se connecter <br> Créer un compte</a>
    </div>
    <div class="container find">
      <a class="car" href="transports.php?id=<?= $festival->id ?>">Trouver mon trajet</a>
      <a class="sleep" href="housing.php?id=<?= $festival->id ?>">Trouver où dormir</a>
    </div>
  </body>
</html>
