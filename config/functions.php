<?php
//Récuperer tous les festivals
function getFestivals()
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT id, title, website, content, photo, date_debut, date_fin FROM festivals ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

//Récuperer un seul festival
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

//Récuperer tous les posts_housing
function getHousings()
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT id, author, title, content, date FROM housings ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

//Récuperer un seul festival
function getHousing($id)
{
  require('config/connect.php');
  $req = $bdd->prepare('SELECT * FROM housings WHERE festivalId = ? ');
  $req->execute(array($id));
  return $req;

}

//Récuperer tous les posts_housing
function getTransports()
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT id, author, title, content, date FROM transports ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

//Récuperer un seul festival
function getTransport($id)
{
  require('config/connect.php');
  $req = $bdd->prepare('SELECT * FROM transports WHERE festivalId = ? ');
  $req->execute(array($id));
  return $req;

}
 ?>
