<?php
session_start();
include 'conf.class.php';


// $_SESSION['login'] = $_POST['pseudo'];
// $_SESSION['pwd'] = $_POST['pwd'];
// $_SESSION['idsession'] = $row['id'];
// ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){

  //Set error messages
	$pseudoError = '';
	$passError = '';

  $pseudo = htmlentities(trim($_POST['pseudo']));
  $pass = htmlentities(trim(md5($_POST['pwd'])));

	$valid = true;

  if(empty($pseudo)){
    $pseudoError = 'Entrer le pseudo du salarié';
    $valid = false;
  }

  if (empty($pass)) {
      $passError = 'Entrez le mot de passe du salarié';
      $valid = false;
  }
}//fin

  if(isset($valid)){
    if($_POST['pseudo'] AND md5($_POST['pwd'] == $valid)){
      // echo 'good job';
      $pdo = confDB::connect();
      // $sql = $pdo->query("SELECT * FROM prive WHERE pseudo='$user'");
      $sql = "SELECT * FROM prive WHERE pseudo='$pseudo' AND motdepasse='$pass'";
      foreach ($pdo->query($sql) as $row) {
      {
        if($_POST['pseudo'] == $row['pseudo']||$_POST['pwd'] == $row['motdepasse'] ){
          require('profil.php');
      }
    }
    confDB::disconnect();
  }
}//final
else
	echo "Error with connexion";
}
?>
