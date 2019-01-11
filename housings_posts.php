
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MyFestival</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style_index.css">
    <link rel="stylesheet" href="style/style_header.css">
  </head>
  <body>
    <?php include 'style/header.php' ?>
<a href="festivals.php">Retour aux publications</a>
      <?php require_once('config/create_housing.php');?>
      <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php
          echo $_SESSION['message'];
          unset ($_SESSION['message']);
           ?>
        </div>

      <?php endif ?>
      <?php $mysqli = new mysqli('localhost', 'root', "", 'myfestivalbdd') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM housings") or die($mysqli->error); ?>


<h2>Vos publications</h2>
<div class="container">
  <div class="row justify-author-center">
    <div class="col-12 posts">
<?php while ($row = $result->fetch_assoc()): ?>
<p class='col-3'><?php echo $row['title']; ?></p>
<p class='col-3'><?php echo $row['festivalId']; ?></p>
<p class='col-3'><?php echo $row['author']; ?></p>
<p class='col-3'><?php echo $row['date']; ?></p>
<p class='col-3'><?php echo $row['nb_places']; ?></p>
<a href="housings_posts.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Modifier</a>
<a href="housings_posts.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a>
<?php endwhile; ?>

<?php
      function pre_r ($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';

      }?>
</div>

      <form class="col-12" method="POST" action="config/create_housing.php">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="form-group">
            <label>Titre de la publication</label>
            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Festival</label>
            <input type="text" name="festivalId" value="<?php echo $festivalId; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Auteur </label>
            <input type="text" name="author" value="<?php echo $author; ?>" class="form-control">
          </div>
          <div class="col-6">
          <div class="form-group">
            <label>date</label>
            <input type="text" name="date" value="<?php echo $date; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Lieu</label>
            <input type="text" name="nb_places" value="<?php echo $nb_places; ?>" class="form-control" placeholder="Enter your location">
          </div>
                    </div>
          <div class="form-group">
            <?php if ($update == true): ?>
            <button type="submit" name="update" class="btn btn-info">Enregistrer</button>
          <?php else: ?>
            <button type="submit" name="save" class="btn btn-primary">nouvel article</button>
          <?php endif; ?>
          </div>
      </form>

    </div>
    </div>

  </body>
</html>
