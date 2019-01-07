<?php
if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
  header('Location: index.php');
  else
{
    extract($_GET);
    $id = strip_tags($id);

    require_once('config/functions.php');

    if(!empty($_POST))
    {
      extract($_POST);
      $errors = array();

      $author = strip_tags($author);
      $comment = strip_tags($comment);

      if(empty($author))
        array_push($errors, 'Entrez un pseudo');

      if(empty($comment))
          array_push($errors, 'Entrez un commentaire');

      if(count($errors) == 0)
      {
        $comment = addComment($id, $author, $comment);

        $success = 'Votre commentaire a été publié';

        unset($author);
        unset($comment);
      }
    }
    $festival = getFestival($id);
    $comments = getComments($id);
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php">Retour aux Festivals</a>
    <h1><?= $festival->title ?></h1>
    <time><?= $festival->date ?></time>
    <p><?= $festival->content ?></p>
    <img src="<?= $festival->photo ?>"</img>
    <hr>
    <?php
    if(isset($success))
        echo $success;

      if (!empty($errors)):?>
        <?php foreach($errors as $error): ?>
          <p><?= $error ?></p>
        <?php endforeach; ?>
     <?php  endif; ?>
    <form class="" action="festival.php?id=<?= $festival->id ?>" method="post">
      <p><label for="author">Pseudo :</label>
      <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>"/></p>
      <p><label for="comment">Commentaire :</label><br>
        <textarea name="comment" id="comment" rows="8" cols="80"><?php if(isset($comment)) echo $comment ?></textarea></p>
        <button type="submit" name="button">Envoyer</button>
    </form>

    <h2>Commentaires :</h2>
    <?php foreach($comments as $com): ?>
      <h3><?= $com->author ?></h3>
      <time><?= $com->date ?></time>
      <p><?= $com->comment ?></p>
    <?php endforeach; ?>
  </body>
</html>
