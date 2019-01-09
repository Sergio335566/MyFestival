<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MyFestival</title>
  </head>
  <body>
    <a href="registration/register.php">Créer un compte / Se connecter</a>
    <h1>Logements</h1>
    <?php foreach($festivals as $festival): ?>
      <h2> <?= $festival->title ?></h2>
      <time><?= $festival->date ?></time>
      <br>
      <br>

      <form class="" method="post">
          <div class="input-group">
            <label>Email</label>
            <input type="text" name="title" value="">
          </div>
          <div class="input-group">
            <label>Mot de passe</label>
            <input type="text" name="content" value="">
          </div>
          <div class="input-group">
            <label>date</label>
            <input type="text" name="date" value="">
          </div>
          <div class="input-group">
            <button type="submit" name="create" class="btn">nouvel article</button>
          </div>
      </form>

      <a href="festival.php?id=<?= $festival->id ?>">Lire la suite</a>
    <?php  endforeach; ?>
  </body>
</html> -->
