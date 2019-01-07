<?php
require_once('config/functions.php');

$festivals = getFestivals();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MyFestival</title>
  </head>
  <body>
    <h1>Festivals :</h1>
    <?php foreach($festivals as $festival): ?>
      <h2> <?= $festival->title ?></h2>
      <time><?= $festival->date ?></time>
      <br>
      <br>
      <a href="festival.php?id=<?= $festival->id ?>">Lire la suite</a>
    <?php  endforeach; ?>
  </body>
</html>
