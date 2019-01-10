<?php

session_start();
$mysqli = new mysqli('localhost', 'root', "", 'myfestivalbdd') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$title = '';
$content = '';
$date = '';
$place = '';


// Créer un nouveau post
if(isset($_POST['save'])){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = $_POST['date'];
  $place = $_POST['place'];
  $mysqli->query("INSERT INTO festivals (title, content, date, place)
  values('$title','$content','$date', '$place') ") or die($mysqli->error);

  $_SESSION['message'] = "Votre publication est desormais en ligne";
  $_SESSION['msg_type'] = "success";

  header("location: ../users_posts.php");
}
// Supprimer un post
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM festivals WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Votre publication à été supprimée";
    $_SESSION['msg_type'] = "danger";

  header("location: ../users_posts.php");
  }

// Editer un post
  if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM festivals WHERE id=$id") or die($mysqli->error());
    if(count($result)==1){
      $row = $result->fetch_array();
      $title = $row['title'];
      $content = $row['content'];
      $date = $row['date'];
      $place = $row['place'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $place = $_POST['place'];

    $mysqli->query("UPDATE festivals SET title='$title', content='$content', date='$date', place='$place' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Votre publication à été mise à jour";
    $_SESSION['msg_type'] = "warning";

  header("location: ../users_posts.php");

}


 ?>
