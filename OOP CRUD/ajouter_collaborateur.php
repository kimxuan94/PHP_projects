<?php
include_once 'includes/config.php';

//Set new connection
$database = new Connection();
$db = $database->getConnection();

include_once 'includes/collaborateur.inc.php';
$collaborateur = new Collaborateur($db);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer un collaborateur</title>

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
        <a class="btn btn-primary" href="collaborateurs.php" role="button">Retour</a>
    </p><br/>
    <?php
    if ($_POST) {

        $collaborateur->idmatrh = $_POST['idrh'];
        $collaborateur->nom = $_POST['nom'];
        $collaborateur->prenom = $_POST['prenom'];
        $collaborateur->adresse = $_POST['adresse'];
        $collaborateur->codepostal = $_POST['cp'];
        $collaborateur->ville = $_POST['ville'];
        $collaborateur->telephone = $_POST['tel'];
        $collaborateur->profession = $_POST['prof'];
        $collaborateur->justificatif = $_POST['justif'];
        $collaborateur->avantage = $_POST['avantage'];
        $collaborateur->date_entree = $_POST['entree'];
        $collaborateur->date_sortie = $_POST['sortie'];
        $collaborateur->commentaire = $_POST['commentaire'];

        if ($collaborateur->createCollaborateur()) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Nouveau collaborateur enregistré!</strong>  <a href="collaborateurs.php">Voir les collaborateurs</a>.
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
    <form method="post" action="ajouter_collaborateur.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="idrh">ID RH</label>
        <input type="text" class="form-control" name="idrh">
      </div>

      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom">
      </div>

      <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" name="prenom">
      </div>

      <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" name="adresse">
      </div>

      <div class="form-group">
        <label for="cp">Code postal</label>
        <input type="text" class="form-control" name="cp">
      </div>

      <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" name="ville">
      </div>

      <div class="form-group">
        <label for="tel">Téléphone</label>
        <input type="text" class="form-control" name="tel">
      </div>

      <div class="form-group">
        <label for="prof">Profession Phardex</label>
        <select name="prof" class="form-control">
          <option>AR</option>
          <option>ARS</option>
          <option>APM</option>
        </select>
      </div>

      <div class="form-group" style="position:relative;">
        <label for="justif">Justificatif conducteur</label>
        <a class='btn btn-primary' href='javascript:;'>
          Sélectionnez un fichier
          <input type="file" name="justif" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="50"  onchange='$("#upload-file-info").html($(this).val());'>
        </a>
        &nbsp;
        <span class='label label-info' id="upload-file-info"></span>
      </div>

      <div class="form-group">
        <label for="avantage">Avantages</label>
        <input type="text" class="form-control" name="avantage">
      </div>

      <div class="form-group">
        <label for="entree">Date entrée</label>
        <input type="text" class="form-control" name="entree">
      </div>

      <div class="form-group">
        <label for="sortie">Date sortie</label>
        <input type="text" class="form-control" name="sortie">
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
