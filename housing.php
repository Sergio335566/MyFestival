<?php
    require_once('config/functions.php');
    $bdd = new PDO('mysql:host=localhost;dbname=myfestivalbdd;charset=utf8', 'root', '');
    $festival ;
    $transports ;

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
  header('Location: festivals.php');
  else
{
    extract($_GET);
    $id = strip_tags($id);

    if(!empty($_POST))
    {
      extract($_POST);
    }

    $festival = getFestival($id);
    $housings = getHousing($id);

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
        <?php include 'style/header.php';?>
    <div class="container">
      <div class="row">
      <div class="col-12 posts">
    <h3><?= $festival->title ?></h3>
    <hr>
    </div>
    </div>
</div>
<?php
$count = $bdd->query('SELECT count(id) from housings WHERE festivalId = "'.$id.'"')->fetchColumn();
$housings_count = 0;
if ($housings_count = 0) {
echo ('Aucun Festival pour le moment');}
else {
  while($housings_count < $count){
    $req = $bdd->prepare('SELECT * FROM transports WHERE id = "'.$housings_count.'"');
    $data = $housings->fetch(PDO::FETCH_OBJ); ?>
    <div class='container'>
      <div class='row transports'>
        <h4 class='col-4 title'> <?= $data->title ?></h4>
        <p class="col-3 date"> <?= $data->nb_places ?> places</p> <br>
        <p class="col-3">par <?= $data->author ?></p>
        <!-- <button type="button" name="button" class=" col-2 btn btn-danger">réserver</button> -->
        <button type="button" name="button" class=" col-2 btn btn-warning">contacter</button>
      </div>
    </div>
    <?php
    $housings_count++;
  }

    $housings->closeCursor();
  }
   ?>


  </div>
</div>

  </body>
</html>
