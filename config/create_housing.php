<?php

session_start();
$mysqli = new mysqli('localhost', 'root', "", 'myfestivalbdd') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$title = '';
$festivalId = '';
$author = '';
$date = '';
$nb_places = '';


// Créer un nouveau post
if(isset($_POST['save'])){
  $title = $_POST['title'];
  $festivalId = $_POST['festivalId'];
  $author = $_POST['author'];
  $date = $_POST['date'];
  $nb_places = $_POST['nb_places'];
  $mysqli->query("INSERT INTO housings (title, festivalId, author, date, nb_places)
  values('$title','$festivalId','$author','$date', '$nb_places') ") or die($mysqli->error);

  $_SESSION['message'] = "Votre publication est desormais en ligne";
  $_SESSION['msg_type'] = "success";

  header("location: ../housings_posts.php");
}
// Supprimer un post
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM housings WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Votre publication à été supprimée";
    $_SESSION['msg_type'] = "danger";

  header("location: ../housings_posts.php");
  }

// Editer un post
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM housings WHERE id=$id") or die($mysqli->error());
    if(count($result)==1){
      $row = $result->fetch_array();
      $title = $row['title'];
      $festivalId = $row['festivalId'];
      $author = $row['author'];
      $date = $row['date'];
      $nb_places = $row['nb_places'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $festivalId = $_POST['festivalId'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $nb_places = $_POST['nb_places'];

    $mysqli->query("UPDATE housings SET title='$title', author='$author', date='$date', nb_places='$nb_places' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Votre publication à été mise à jour";
    $_SESSION['msg_type'] = "warning";

  header("location: ../housings_posts.php");

}
 ?>
