<?php
session_start();
$_SESSION['login'] = $_POST['pseudo'];
$_SESSION['pwd'] = $_POST['pwd'];
$_SESSION['idsession'] = $row['id'];
$_SESSION['type'] = $row['type_compte'];

require_once 'conf.class.php';

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
