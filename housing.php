<?php
if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
  header('Location: festivals.php');
  else
{
    extract($_GET);
    $id = strip_tags($id);

    require_once('config/functions.php');

    if(!empty($_POST))
    {
      extract($_POST);
    }

    $festival = getFestival($id);
    $housings = getHousing($id);
    $transports = getTransport($id);
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style_index.css">
    <link rel="stylesheet" href="style/style_header.css">
    <title></title>
  </head>
  <body>
        <?php include 'header.php';?>
    <div class="container">
      <div class="row">
      <div class="col-12 posts">
    <h3><?= $festival->title ?></h3>
    <hr>
    </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <h1 class="col-12"><?= $housings->title ?></h1>
    <time class="col-12"><?= $housings->date ?></time>
    <p class="col-12"><b>Publié par : <?= $housings->author ?></b></p>
    <p class="col-12"><?= $housings->content ?></p>
  </div>
</div>
  </body>
</html>
