<?php
session_start();
$_SESSION['login'] = $_POST['pseudo'];
$_SESSION['pwd'] = $_POST['pwd'];
$_SESSION['idsession'] = $row['id'];
$_SESSION['type'] = $row['type_compte'];

// require_once 'conf.class.php';
require 'conf.class.php';
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){

  //Set error messages
	$pseudoError = '';
	$passError = '';

	$id = $_SESSION['idsession'];
  $typecmp = $_SESSION['type'];
  $pseudo = htmlentities(trim($_POST['pseudo']));
  $pass = htmlentities(trim(md5($_POST['pwd'])));

  $valid = true;

  if(empty($pseudo)){
    $pseudoError = 'Entrer le pseudo du salarié';
    $valid = false;
  } else {
    echo 'Pseudo incorrect';
  }

  if (empty($pass)) {
      $passError = 'Entrez le mot de passe du salarié';
      $valid = false;
  }else {
    echo 'Mot de passe incorrect';
  }

	if($_POST['pseudo'] AND md5($_POST['pwd'] == $valid)){
// 	echo "Connexion réussie";}
// 	else {
// 		echo "Pas de connexion";
//   }
// // }fin
//
// if($valid) {
	$pdo = confDB::connect();
	// if($_POST['pseudo'] AND md5($_POST['pwd'] == TRUE)){
	  // echo 'good job';
	  // $sql = $pdo->query("SELECT * FROM prive WHERE pseudo='$user'");
	  $sql = "SELECT * FROM prive WHERE pseudo='$pseudo' AND motdepasse='$pass'";
		// $sql = "INSERT INTO prive (id,type_compte,pseudo,motdepasse) values(?, ?, ?, ?)";
		$req = $pdo->prepare($sql);
		// $req->execute(array($id,$typecmp,$pseudo,$pass));
		foreach ($pdo->query($sql) as $row)
		  {
		    if($_POST['pseudo'] == $row['pseudo']||$_POST['pwd'] == $row['motdepasse'] )
		      echo 'good job';
		  }
		confDB::disconnect();
				header("Location: profil.php");
}
// 		header("Location: collaborateurs.php");
//
// 		foreach ($pdo->query($sql) as $row)
// 	  {
// 	    if($_POST['pseudo'] == $row['pseudo']||$_POST['pwd'] == $row['motdepasse'] )
// 	      require('profil.php');
// 	  }
// 	confDB::disconnect();
// }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Connexion</title>

          <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="assets/connexion.css">
        	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet"> -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
  <body>
		<div class="container">
			<div class="page-header">
		<h1>Bienvenue dans l'espace prive <small>Déjà chez nous? Connectez-vous</small></h1>
			</div>
		<form action="control.php" method="POST">
			<div class="row">
				 <div class="form-group col-lg-5">
					 <legend><h4><span class="glyphicon glyphicon-home"></span> Accéder à mon compte</h4></legend>
					<!-- <label for="Pseudo">Pseudo</label>
					<input type="text" class="form-control input" name="pseudo" placeholder="Entrez votre pseudo">
					<label for="mdp">Mot de passe</label>
					<input type="password" class="form-control input" name="pwd" placeholder="Entrez votre mot de passe"> -->
          <div class="control-group <?php echo !empty($pseudoError)?'error':'';?>">
              <label class="control-label">Pseudo</label>
          	<div class="controls">
                  <input name="pseudo" type="text" class="form-control" placeholder="Pseudo ici" value="<?php echo !empty($pseudo)?$pseudo:'';?>">
                  <?php if (!empty($pseudoError)): ?>
                      <span class="help-inline"><?php echo $pseudoError;?></span>
                  <?php endif; ?>
          	</div>
          </div><br />

          <div class="control-group <?php echo !empty($passError)?'error':'';?>">
              <label class="control-label">Mot de passe</label>
          	<div class="controls">
                  <input name="pwd" type="password" class="form-control" placeholder="Mot de passe ici" value="<?php echo !empty($pass)?$pass:'';?>">
                  <?php if (!empty($passError)): ?>
                      <span class="help-inline"><?php echo $passError;?></span>
                  <?php endif; ?>
          	</div>
          </div><br />

        </div>
			</div>
			<a href="#">Mot de passe oublié?</a>
			<button type="submit" class="btn btn-primary btn-md">Je me connecte</button>
    </form>
	</div>
  </body>
</html>
