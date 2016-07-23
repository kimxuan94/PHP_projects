<?php
  session_start();
  // $_SESSION['login'] = $_POST['pseudo'];
  // $_SESSION['pwd'] = $_POST['pwd'];
  // $_SESSION['idsession'] = $data['id'];
  // require('conf.class.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Profil</title>

          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="assets/profil.css">
          <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
      <legend><h4>Informations compte utilisateur : </h4></legend>
<?php
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
/*    $matkey=$_SESSION['Pk_matRH'];
*/}
if (null == $id) {
    header("location:index.php");

    if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){

    	//Set error messages
      $idErr= NULL;
      $tcompteErr= NULL;
    	$pseudoErr= NULL;
    	$passErr = NULL;
    	$emailErr = NULL;

    	//Get inputs values
      $id= $_POST['id'];
      $tcompte= $_POST['type_compte'];
    	$pseudo = $_POST['pseudo'];
    	$pass = $_POST['pwd'];
      $email= $_POST['email'];
                 //Formalize form inputs
        $valid = true;
        if(empty($id)){
        	$idErr = 'Entrer id';
        	$valid = false;}

        if(empty($tcompte)){
          $tcompteErr = 'Entrer type de compte';
          $valid = false;}

        if(empty($pseudo)){
        	$pseudoErr = 'Entrer pseudo';
        	$valid = false;}

        if (empty($pass)) {
            $passErr = 'Entrez mot de passe';
            $valid = false;}

        if(empty($email)){
            $emailErr ='Entrez adresse mail';
            $valid= false;}

    ///////////////////////////////////////
    if($valid) {
    $pdo = confDB::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE prive SET (id=?,nom=?,type_compte=?,pseudo=?,motdepasse=?,e_mail=?) WHERE id = '".$_SESSION["idsession"]."'";
		$req = $pdo->prepare($sql);
    // $_SESSION['login'] = $_POST['pseudo'];
    // $_SESSION['pwd'] = $_POST['pwd'];
    // $_SESSION['idsession'] = $data['id'];
    // var_dump($_SESSION);
		$req->execute(array($id,$tcompte,$pseudo,$pass,$email));
		confDB::disconnect();
		header("Location: index.php");
    // }else {

} else {
  $pdo = confDB::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM prive where id = '".$_SESSION["idsession"]."'";
  $req = $pdo->prepare($sql);
  $req->execute(array($matkey));
  $data = $req->fetch(PDO::FETCH_ASSOC);
  $id = $data['id'];
  $tcompte = $data['type_compte'];
  $pseudo = $data['pseudo'];
  $pass = $data['motdepasse'];
  $email = $data['e_mail'];
  $_SESSION['login'] = $_POST['pseudo'];
  $_SESSION['pwd'] = $_POST['pwd'];
  $_SESSION['idsession'] = $data['id'];
  var_dump($_SESSION);
  confDB::disconnect();
  }
}
// require 'conf.class.php';
// $req = $pdo->query("SELECT * FROM prive WHERE id = '".$_SESSION["idsession"]."'");
//
// while ($donnees = $req->fetch())
// {
?>
<div class="news">
  <div class="jumbotron">
    <h2><span class="glyphicon glyphicon-user"></span> Modifier mon profil :  </h2><br />


<!-- <p><label> Type de compte :</label> <?php echo htmlspecialchars($donnees['type_compte']); ?></p>
<p><label> Pseudo :</label> <?php echo htmlspecialchars($donnees['pseudo']); ?></p>
<p><label> Mot de passe :</label> <?php echo 'celui que vous avez choisi lors de votre inscription'; ?></p>
<p><label> E-mail :</label> <?php echo htmlspecialchars($donnees['e_mail']); ?></p> -->

<!-- <form method="POST" action="mod2.php?id=<?php echo $id;?>">
<div class="form-horizontal">
    <div class="control-group">
    <label class="control-label">ID</label>
    <div class="controls">
    <label>
        <?php echo  $data['id']; ?>
    </label>
    </div>
    <div class="control-group">
    <label class="control-label">Type de compte</label>
    <div class="controls">
    <label>
        <?php echo  $data['type_compte']; ?>
    </label>
    </div>

    <div class="control-group">
    <label class="control-label">Pseudo</label>
    <div class="controls">
    <label>
        <?php echo  $data['pseudo']; ?>
    </label>
    </div>

    <div class="control-group">
    <label class="control-label">Mot de passe</label>
    <div class="controls">
    <label>
        <?php echo  $data['motdepasse']; ?>
    </label>
    </div>

    <div class="control-group">
    <label class="control-label">E-mail</label>
    <div class="controls">
    <label>
        <?php echo  $data['e_mail']; ?>
    </label>
    </div> -->

    <form method="post" action="mod2.php?id=<?php echo $id;?>">
        <div class="control-group" <?php echo!empty($idErr) ? 'error' : '';?>">
        <label class="control-label">ID</label>
        <div class="controls">
            <p><input type="text" name="id" placeholder="ID" value="<?php echo!empty($id) ? $id : ''; ?>"></p>
                        <?php if (!empty($idErr)): ?>
                            <span class="help-inline"><?php echo $idErr; ?></span>
                        <?php endif; ?>
        </div>
        </div>

        <div class="control-group" <?php echo!empty($tcompteErr) ? 'error' : '';?>">
        <label class="control-label">Type de compte</label>
        <div class="controls">
            <p><input type="text" name="tcompte"  placeholder="Type de compte" value="<?php echo!empty($tcompte) ? $tcompte : ''; ?>"></p>
                        <?php if (!empty($tcompteErr)): ?>
                            <span class="help-inline"><?php echo $tcompteErr; ?></span>
                        <?php endif; ?>
        </div>
        </div>

        <div class="control-group" <?php echo!empty($pseudoErr) ? 'error' : '';?>">
        <label class="control-label">Pseudo</label>
        <div class="controls">
            <p><input type="text" name="pseudo" placeholder="Pseudo" value="<?php echo!empty($pseudo) ? $pseudo : ''; ?>"></p>
                        <?php if (!empty($pseudoErr)): ?>
                            <span class="help-inline"><?php echo $pseudoErr; ?></span>
                        <?php endif; ?>
        </div>
        </div>

        <div class="control-group" <?php echo!empty($passErr) ? 'error' : '';?>">
        <label class="control-label">Mot de passe</label>
        <div class="controls">
            <p><input type="password" name="pwd" placeholder="Mot de passe" value="<?php echo!empty($pass) ? $pass : ''; ?>"></p>
                        <?php if (!empty($passErr)): ?>
                            <span class="help-inline"><?php echo $passErr; ?></span>
                        <?php endif; ?>
        </div>
        </div>

        <div class="control-group" <?php echo!empty($emailErr) ? 'error' : '';?>">
        <label class="control-label">E-mail</label>
        <div class="controls">
            <p><input type="email" name="email" placeholder="Adresse mail" value="<?php echo!empty($email) ? $email : ''; ?>"></p>
                        <?php if (!empty($emailErr)): ?>
                            <span class="help-inline"><?php echo $emailErr; ?></span>
                        <?php endif; ?>
        </div>
        </div>


<div class="form-actions">
  <span class="but"><a href="mod2.php" class="btn btn-success btn-md">Modifier mes infos</a>
  <a href="index.php" class="btn btn-primary btn-md">Je me déconnecte</a></span>
</div>

            </form>
</div>
<?php
} // Fin de la boucle des billets?>
<?php
$req->closeCursor();
// confDB::disconnect();
// }
session_destroy();
?>
</body>
</html>
