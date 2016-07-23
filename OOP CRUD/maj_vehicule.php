<?php
include_once 'includes/config.php';

// $id = isset($_GET['id']) ? ($_GET['id']) : die('Erreur avec l\'ID RH Collaborateur');
$id = isset($_GET['id']) ? $_GET['id'] : die('Problème avec Vehicule ID');

$database = new Connection();
$db = $database->getConnection();

include_once 'includes/vehicule.inc.php';
$vehicule = new Vehicule($db);

$vehicule->id = $id;
$vehicule->readVehiculeID();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mettre à jour véhicule</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  </head>
  <body>
  <p><br/></p>
    <div class="container">
      <p>
	<a class="btn btn-primary" href="vehicules.php" role="button">Retour</a>
      </p><br/>
<?php
if($_POST){

  $vehicule->idimmatveh = $_POST['idvh'];
  $vehicule->num_contrat = $_POST['nocontrat'];
  $vehicule->loueur = $_POST['loueur'];
  $vehicule->val_achat = $_POST['vachat'];
  $vehicule->premiere_circulation = $_POST['pcirc'];
  $vehicule->entree_parc = $_POST['entree'];
  $vehicule->sortie_parc = $_POST['sortie'];
  $vehicule->categorie = $_POST['cat'];
  $vehicule->marque = $_POST['marque'];
  $vehicule->modele = $_POST['modele'];
  $vehicule->version = $_POST['version'];
  $vehicule->num_chassis = $_POST['nchassis'];
  $vehicule->boite_vitesse = $_POST['bvitesse'];
  $vehicule->puissance_fiscale = $_POST['pfisc'];
  $vehicule->km = $_POST['km'];
  $vehicule->portes = $_POST['portes'];
  $vehicule->places = $_POST['places'];
  $vehicule->reservoir = $_POST['reservoir'];
  $vehicule->carburant = $_POST['carburant'];
  $vehicule->consomixte = $_POST['consomixte'];
  $vehicule->co2 = $_POST['co2'];
  $vehicule->detention = $_POST['detention'];
  $vehicule->loyer_financier= $_POST['lfin'];
  $vehicule->loyer_p_financier = $_POST['lpfin'];
  $vehicule->loyer_pneu = $_POST['lpneu'];
  $vehicule->loyer_autre = $_POST['lautre'];
  $vehicule->loyer_total = $_POST['ltotal'];
  $vehicule->commentaire = $_POST['commentaire'];

	if($vehicule->updateVehicule()){
?>
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Mise à jour réussi!</strong> <a href="vehicules.php">Voir les véhicules</a>.
</div>
<!-- <script>window.location.href='vehicules.php'</script> -->
<?php
	}else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Erreur lors de la mise à jour!</strong>
</div>
<?php
	}
}
?>
<form method="post">
  <div class="form-group">
    <label for="idvh">ID VEH</label>
    <input type="text" class="form-control" name="idvh" value='<?php echo $vehicule->idimmatveh; ?>'>
  </div>

  <div class="form-group">
    <label for="nocontrat">N°contrat</label>
    <input type="text" class="form-control" name="nocontrat" value='<?php echo $vehicule->num_contrat; ?>'>
  </div>

  <div class="form-group">
    <label for="loueur">Sélectionnez la société de location</label>
    <select class="form-control" id="sel1" name="loueur" value='<?php echo $vehicule->loueur; ?>'>
      <option>LEASEPLAN</option>
      <option>ALPHABET</option>
      <option>AUTRE</option>
    </select>
  </div>

  <div class="form-group">
    <label for="vachat">Valeur d'achat</label>
    <input type="text" class="form-control" name="vachat" value='<?php echo $vehicule->val_achat; ?>'>
  </div>

  <div class="form-group">
    <label for="pcirc">1ère circulation</label>
    <input type="date" class="form-control" name="pcirc" value='<?php echo $vehicule->premiere_circulation; ?>'>
  </div>

  <div class="form-group">
    <label for="entree">Entrée parc</label>
    <input type="date" class="form-control" name="entree" value='<?php echo $vehicule->entree_parc; ?>'>
  </div>

  <div class="form-group">
    <label for="sortie">Sortie parc</label>
    <input type="date" class="form-control" name="sortie" value='<?php echo $vehicule->sortie_parc; ?>'>
  </div>

  <div class="form-group">
    <label for="cat">Sélectionnez la categorie véhicule</label>
    <select class="form-control" id="sel1" name="cat" value='<?php echo $vehicule->categorie; ?>'>
      <option>VP</option>
      <option>VU</option>
      <option>VI</option>
    </select>
  </div>

  <div class="form-group">
    <label for="marque">Sélectionnez la marque</label>
    <select class="form-control" id="sel1" name="marque" value='<?php echo $vehicule->marque; ?>'>
      <option>Audi</option>
      <option>BMW</option>
      <option>Autre</option>
    </select>
  </div>

  <div class="form-group">
    <label for="modele">Modele</label>
    <input type="text" class="form-control" name="modele" value='<?php echo $vehicule->modele; ?>'>
  </div>

  <div class="form-group">
    <label for="version">Version</label>
    <input type="text" class="form-control" name="version" value='<?php echo $vehicule->version; ?>'>
  </div>

  <div class="form-group">
    <label for="nchassis">N°chassis</label>
    <input type="text" class="form-control" name="nchassis" value='<?php echo $vehicule->num_chassis; ?>'>
  </div>

  <div class="form-group">
    <label for="bvitesse">Sélectionnez la boite de vitesse</label>
    <select class="form-control" id="sel1" name="bvitesse" value='<?php echo $vehicule->boite_vitesse; ?>'>
      <option selected>Automatique</option>
      <option>Manuelle</option>
    </select>
  </div>

  <div class="form-group">
    <label for="pfisc">Puissance fiscale (ch)</label>
    <input type="text" class="form-control" name="pfisc" value='<?php echo $vehicule->puissance_fiscale; ?>'>
  </div>

  <div class="form-group">
    <label for="km">KM</label>
    <input type="text" class="form-control" name="km" value='<?php echo $vehicule->km; ?>'>
  </div>

  <div class="form-group">
    <label for="portes">Nombre de portes</label>
    <input type="text" class="form-control" name="portes" value='<?php echo $vehicule->portes; ?>'>
  </div>

  <div class="form-group">
    <label for="places">Nombre de places</label>
    <input type="text" class="form-control" name="places" value='<?php echo $vehicule->places; ?>'>
  </div>

  <div class="form-group">
    <label for="reservoir">Reservoir</label>
    <input type="text" class="form-control" name="reservoir" value='<?php echo $vehicule->reservoir; ?>'>
  </div>

  <div class="form-group">
    <label for="carburant">Sélectionnez le carburant</label>
    <select class="form-control" id="sel1" name="carburant" value='<?php echo $vehicule->carburant; ?>'>
      <option selected>Diesel</option>
      <option>Essence</option>
      <option>Autre</option>
    </select>
  </div>

  <div class="form-group">
    <label for="consomixte">Consommation mixte</label>
    <input type="text" class="form-control" name="consomixte" value='<?php echo $vehicule->consomixte; ?>'>
  </div>

  <div class="form-group">
    <label for="co2">Quantité CO2</label>
    <input type="text" class="form-control" name="co2" value='<?php echo $vehicule->co2; ?>'>
  </div>

  <div class="form-group">
    <label for="detention">Sélectionnez la detention</label>
    <select class="form-control" id="sel1" name="detention" value='<?php echo $vehicule->detention; ?>'>
      <option>Achat</option>
      <option>LCD</option>
      <option selected>LLD</option>
    </select>
  </div>

  <div class="form-group">
    <label for="lfin">Loyer financier</label>
    <input type="text" class="form-control" name="lfin" value='<?php echo $vehicule->loyer_financier; ?>'>
  </div>

  <div class="form-group">
    <label for="lpfin">Loyer perte financière</label>
    <input type="text" class="form-control" name="lpfin" value='<?php echo $vehicule->loyer_p_financier; ?>'>
  </div>

  <div class="form-group">
    <label for="lpneu">Loyer pneu</label>
    <input type="text" class="form-control" name="lpneu" value='<?php echo $vehicule->loyer_pneu; ?>'>
  </div>

  <div class="form-group">
    <label for="lautre">Loyer autre</label>
    <input type="text" class="form-control" name="lautre" value='<?php echo $vehicule->loyer_autre; ?>'>
  </div>

  <div class="form-group">
    <label for="ltotal">Loyer total</label>
    <input type="text" class="form-control" name="ltotal" value='<?php echo $vehicule->loyer_total; ?>'>
  </div>

  <div class="form-group">
    <label for="commentaire">Commentaire</label>
    <textarea class="form-control" rows="3" name="commentaire"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Mettre à jour</button>
</form>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
