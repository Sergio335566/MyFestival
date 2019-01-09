<?php session_start();
if (empty($_SESSION['email'])) {
  header("location:../index.php");
}
 ?>

Bienvenue <?php echo $_SESSION['username'];?>
<a href="logout.php">Se déconnecter</a>
