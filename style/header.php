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
    <a href="festivals.php"><img src="pictures/house.svg" class="home" alt=""></a>
<img src="pictures/MYF.png" class="logo" alt="">
<a href="register/register.php"><img src="pictures/user.svg" class="register" alt=""></a>

    </div>
    <div class="container find">
      <a class="car" href="transports.php?id=<?= $festival->id ?>">Trouver mon trajet</a>
      <a class="sleep" href="housing.php?id=<?= $festival->id ?>">Trouver où dormir</a>
    </div>
  </body>
</html>
