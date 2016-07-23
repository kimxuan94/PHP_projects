<?php
session_start();
$_SESSION['login'] = $_POST['pseudo'];
$_SESSION['pwd'] = $_POST['pwd'];
$_SESSION['idsession'] = $row['id'];
ini_set('display_errors', 1);

//Déclare les variables
$user = $_POST['pseudo'];
$pass = md5($_POST['pwd']);
// $idsession = $_SESSION['idsession'];
$valid = true;

// if(isset($_POST['pseudo'])){
//   echo 'Pseudo correct'.'<br />';
// }
// else {
//   echo 'Désolé, votre identifiant est incorrect';
// }
//
// if(isset($_POST['pwd'])){
//   echo 'Mot de passe correct'.'<br />';
// }
// else {
//   echo 'Désolé, votre mot de passe est incorrect';
// }
include 'conf.class.php';
if(null !== $user AND $pass){
  if($_POST['pseudo'] AND md5($_POST['pwd'] == $valid)){
    // echo 'good job';
    $pdo = confDB::connect();
    // $sql = $pdo->query("SELECT * FROM prive WHERE pseudo='$user'");
    // $sql = "SELECT * FROM prive WHERE pseudo='$user' AND motdepasse='$pass'";
    // foreach ($pdo->query($sql) as $row) {
    // {
    $req = $pdo->query("SELECT * FROM prive WHERE id = '".$_SESSION["idsession"]."'");

    while ($donnees = $req->fetch())
    {
      if($_POST['pseudo'] == $row['pseudo']||$_POST['pwd'] == $row['motdepasse'] ){
        include('profil.php');
      }
      // else {
      //   echo 'Utilisateur inconnu';
      // }

      // if(md5($_POST['pwd'] == $row['motdepasse'])){
      //   echo 'Ce mot de passe existe';
      // }
      // else {
      //   echo 'Aucun mot de passe trouvé';
      // }

  }
    confDB::disconnect();
  }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Modifier profil</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/profil.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
<div class="container">

<div class="row">

<h3>Afficher mes infos<h3>

</div>

<div class="form-horizontal">
    <div class="control-group">
    <label class="control-label">ID : </label>
    <div class="controls">
    <label>
        <?php

        echo  $donnees['id']; ?>
    </label>
    </div>

    <div class="control-group">
    <label class="control-label">Type de compte : </label>
    <div class="controls">
    <label>
        <?php echo  $donnees['type_compte']; ?>
    </label>
    </div>

    <div class="control-group">
    <label class="control-label">Pseudo : </label>
    <div class="controls">
    <label>
        <?php echo  $donnees['pseudo']; ?>
    </label>
    </div>

    <div class="control-group">
    <label class="control-label">Mot de passe : </label>
    <div class="controls">
    <label>
        <?php echo  $donnees['motdepasse']; ?>
    </label>
    </div>

    <div class="control-group">
    <label class="control-label">E-mail : </label>
    <div class="controls">
    <label>
        <?php echo  $donnees['e-mail']; ?>
    </label>
    </div>
</div>

<div class="form-actions">
                        <a class="btn" href="index.php">Précédent</a>
</div>



</div>

</div>


</div>
<!-- /container -->
    </body>
</html>
