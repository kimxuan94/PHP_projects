<?php
session_start();
$_SESSION['login'] = $_POST['pseudo'];
$_SESSION['pwd'] = $_POST['pwd'];
$_SESSION['idsession'] = $donnees['id'];
print_r($_SESSION);
       require 'conf.class.php';

$id = null;
if ( !empty($_GET['id'])) {
		$id = $_GET['id'];
}

if ( null==$id ) {
  // header("Location: index.php");
}

      if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

          // on initialise nos erreurs
          $pseudoErr = null;
          $motdepasseErr = null;
          $emailErr = null;

          // On assigne nos valeurs
          $pseudo = $_POST['pseudo'];
          $motdepasse = $_POST['pwd'];
          $email = $_POST['email'];


          // On verifie que les champs sont remplis
          $valid = true;
          if (empty($pseudo)) {
              $pseudoErr = 'Please enter pseudo';
              $valid = false;
          }
          if (empty($motdepasse)) {
              $motdepasseErr = 'Please enter pass';
              $valid = false;
          }

          if (empty($email)) {
              $emailErr = 'Please enter Email Address';
              $valid = false;
          } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = 'Please enter a valid Email Address';
              $valid = false;
          }
          // mise à jour des donnés
              if ($valid) {
              $pdo = confDB::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sql = "UPDATE prive SET pseudo = ?,motdepasse = ?,e_mail = ? WHERE id = '".$_SESSION["idsession"]."'";
              $q = $pdo->prepare($sql);
              $q->execute(array($pseudo,$motdepasse,$email));
              confDB::disconnect();
              header("Location: index.php");
          }
         }else {

               $pdo = confDB::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT * FROM prive where id = ?";
              $q = $pdo->prepare($sql);
              $q->execute(array($id));
              $donnees = $q->fetch(PDO::FETCH_ASSOC);
              $pseudo = $donnees['pseudo'];
              $motdepasse = $donnees['pwd'];
              $email = $donnees['email'];
              confDB::disconnect();
          }

      ?>

<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Modif</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="assets/profil.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>


<div class="container">

<div class="news">

<h3>Modifier un contact</h3>

</div>

          <form method="POST" action="mod.php?id=<?php echo $id ;?>">

<div class="control-group <?php echo!empty($pseudoErr) ? 'error' : ''; ?>">
                  <label class="control-label">Pseudo : </label>

<div class="controls">
                      <input name="pseudo" type="text"  placeholder="pseudo" value="<?php echo!empty($pseudo) ? $pseudo : ''; ?>">
                      <?php if (!empty($pseudoErr)): ?>
                          <span class="help-inline"><?php echo $pseudoErr; ?></span>
                      <?php endif; ?>
</div>

</div>



<div class="control-group<?php echo!empty($motdepasseErr) ? 'error' : ''; ?>">
                  <label class="control-label">Mot de passe : </label>

<div class="controls">
                      <input type="password" name="pwd" value="<?php echo!empty($motdepasse) ? $motdepasse : ''; ?>">
                      <?php if (!empty($motdepasseErr)): ?>
                          <span class="help-inline"><?php echo $motdepasseErr; ?></span>
                      <?php endif; ?>
</div>

</div>


<div class="control-group<?php echo!empty($emailErr) ? 'error' : ''; ?>">
                  <label class="control-label">E-mail : </label>

<div class="controls">
                      <input type="email" name="email" value="<?php echo!empty($email) ? $email : ''; ?>">
                      <?php if (!empty($emailErr)): ?>
                          <span class="help-inline"><?php echo $emailErr; ?></span>
                      <?php endif; ?>
</div>

</div>
</div>

<div class="form-actions">
                  <input type="submit" class="btn btn-success" name="submit" value="submit">
                  <a class="btn" href="index.php">Retour</a>
</div>

          </form>



</div>


  </body>
<?php  $req->closeCursor();
  session_destroy();?>
</html>
