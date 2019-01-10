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
  <div class="row transports">
      <p class="col-12 date"><time>publié le <?= $transports->date ?></time></p>
    <h3 class="col-3 title"><?= $transports->title ?></h3>
    <p class="col-2 nb_places"><?= $transports->nb_places ?></p>
    <p class="col-3 author"><b><?= $transports->author ?></b></p>


    <p class="col-3"><?= $transports->content ?></p>


  </div>
</div>
  </body>
</html>
