<?php
include_once 'includes/config.php';

//Set new connection
$database = new Connection();
$db = $database->getConnection();

include_once 'includes/frais.inc.php';
$frais = new Frais($db);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer un frais</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body>
  <style>
  .label-info {
    background-color: purple;
  }
  </style>
<p><br/></p>
<div class="container">
    <p>
        <a class="btn btn-primary" href="frais.php" role="button">Retour</a>
    </p><br/>
    <?php
    if ($_POST) {

        $frais->poste_frais = $_POST['pfrais'];
        $frais->reparation = $_POST['repar'];
        $frais->gardiennage = $_POST['gard'];
        $frais->remplacement = $_POST['remp'];
        $frais->remise_neuf = $_POST['rneuf'];
        $frais->supp_pneu = $_POST['spneu'];
        $frais->facturation = $_POST['fact'];
        $frais->commentaire = $_POST['commentaire'];

        if ($frais->createFrais()) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Nouveau frais enregistré!</strong>  <a href="frais.php">Voir les frais</a>.
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Erreur lors de la création!</strong>
            </div>
            <?php
        }
    }
    ?>
    <form method="post" action="ajouter_frais.php" enctype="multipart/form-data">

      <div class="form-group">
        <label for="pfrais">Poste de frais</label>
        <input type="text" class="form-control" name="pfrais">
      </div>

      <div class="form-group">
        <label for="repar">Réparation</label>
        <input type="text" class="form-control" name="repar">

      </div>

      <div class="form-group">
        <label for="gard">Gardiennage</label>
        <input type="text" class="form-control" name="gard">
      </div>

      <div class="form-group">
        <label for="remp">Remplacement</label>
        <input type="text" class="form-control" name="remp">
      </div>

      <div class="form-group">
        <label for="rneuf">Remise à neuf</label>
        <input type="text" class="form-control" name="rneuf">
      </div>

      <div class="form-group">
        <label for="spneu">Supplément pneu</label>
        <input type="text" class="form-control" name="spneu">
      </div>

      <div class="form-group">
        <label for="fact">Date de facturation</label>
        <input type="date" class="form-control" name="fact">
      </div>

      <div class="form-group">
        <label for="commentaire">Commentaire</label>
        <textarea class="form-control" rows="3" name="commentaire"></textarea>
      </div>
      <button type="submit" class="btn btn-success">Envoyer</button>
    </form>
  </div>
  <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
