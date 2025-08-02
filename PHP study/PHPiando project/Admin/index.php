<?php include_once 'config/config.php'; ?>

<?php 
if(!isset($_SESSION['userlogged'])){
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

  <?php include_once 'parts/head.php'; ?>

  <body>
    <!-- Header -->
    <section>
      <?php include_once 'parts/menu.php'; ?>

      <?php include_once 'pages/home.php'; ?>
    </section>

    <?php include_once 'parts/scripts.php'; ?>

  </body>
</html>