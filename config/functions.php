<?php
//Ajouter un commentaire
function addFestival($id, $title, $content)
{
  require('config/connect.php');
  $req = $bdd->prepare('INSERT INTO festivals (id, title, content) VALUES (?, ?, ?)');
  $req->execute(array($id, $title, $content));
  $req->closeCursor();
}

//Récuperer tous les articles
function getFestivals()
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT id, title, content, date FROM festivals ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

//Récuperer un seul article
function getFestival($id)
{
  require('config/connect.php');
  $req = $bdd->prepare('SELECT * FROM festivals WHERE id = ?');
  $req->execute(array($id));
  if($req->rowCount() == 1)
{
  $data = $req->fetch(PDO::FETCH_OBJ);
  return $data;
}
  else
  header('Location: index.php');
  $req->closeCursor();
}

//Ajouter un commentaire
function addComment($festivalId, $author, $comment)
{
  require('config/connect.php');
  $req = $bdd->prepare('INSERT INTO comments (festivalId, author, comment, date) VALUES (?, ?, ?, NOW())');
  $req->execute(array($festivalId, $author, $comment));
  $req->closeCursor();
}

//Supprimer un commentaire
function getComment($festivalId, $author, $comment)
{
  require('config/connect.php');
  $req = $bdd->prepare('DELETE FROM comments (festivalId, author, comment, date) VALUES (?, ?, ?, NOW())');
  $req->execute(array($festivalId, $author, $comment));
  $req->closeCursor();
}

//récuperer les commentaires d'un article.
function getComments($id)
{
  require('config/connect.php');
  $req = $bdd->prepare('SELECT * FROM comments WHERE festivalId = ?');
  $req->execute(array($id));
  $data = $req->fetchAll(PDO::FETCH_OBJ);
  return $data;
  $req->closeCursor();
}

 ?>
