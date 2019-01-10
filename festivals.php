<?php

require_once('config/functions.php');
$festivals = getFestivals();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style_index.css">
    <link rel="stylesheet" href="style/style_header.css">
    <title>MyFestival</title>
  </head>
  <body>
    <div class="header">
    <a href="#" class="home">home</a>
<img src="pictures/MYF.png" class="logo" alt="">
<a class="register" href="registration/register.php">Se connecter <br> Créer un compte</a>
    </div>
    <!-- <a href="users_posts.php">Publier une offre</a> -->
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
      <button type="button" name="button" class=" col-6 btn btn-warning">Trouvez votre transport</button>
          </div>
      <br>
      <br>
        </div>
    <?php  endforeach; ?>

    </div>
  </body>
</html>
