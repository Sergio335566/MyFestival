<?php

require_once('config/functions.php');
$festivals = getFestivals();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style_festivals.css">
    <link rel="stylesheet" href="style/style_header.css">
    <title>MyFestival</title>
  </head>
  <body>
    <div class="header">
    <a href="index.php"><img src="pictures/house.svg" class="home" alt=""></a>
<a href="index.php"><img src="pictures/MYF.png" class="logo" alt=""></a>
<a href="register/register.php"><img src="pictures/user.svg" class="register" alt=""></a>

    </div>

        <?php foreach($festivals as $festival): ?>

    <div class="container">
      <div class="row festivals">
      <div class="col-5 post">
      <img class="photo_festival" src="<?= $festival->photo ?>" alt=""></img><br>
            </div>

      <div class="col-7">
      <h3 class="col-6"><a href="transports.php?id=<?= $festival->id ?>"> <?= $festival->title ?></a></h3>
      <p class="col-12 date"> <?= $festival->date_debut ?> - <?= $festival->date_fin ?> </p> <br>
      <p class="col-12"><?= $festival->content ?></p>
      <p class="col-12"><a href="<?= $festival->website ?>"> <?= $festival->website ?> </a></p>
      <a  class="btn btn-danger" href="housing.php?id=<?= $festival->id ?>"> Logements</a>
      <a  class="btn btn-warning" href="transports.php?id=<?= $festival->id ?>"> Transport</a>
          </div>

      <br>
      <br>
        </div>

    <?php  endforeach; ?>
    </div>
  </body>
</html>
