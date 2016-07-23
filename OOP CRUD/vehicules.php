<?php
header('Content-Type: charset=utf-8');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'includes/config.php';
include_once 'includes/vehicule.inc.php';

error_reporting(E_ALL);
ini_set('display_errors', true);

//Set connection to Database
$database = new Connection();
$db = $database->getConnection();

$vehicule = new Vehicule($db);

$stmt = $vehicule->readAll($page, $from_record_num, $records_per_page);
$num = $stmt->rowCount();
?>
 <!DOCTYPE html>
 <html lang="fr">
   <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>OOP CRUD</title>

     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/views.css" rel="stylesheet">

       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

   </head>
   <body>
   <p><br/></p>
   <p>
<a class="btn btn-primary" href="ajouter_vehicule.php" role="button">Créer un nouveau véhicule</a>
<a class="btn btn-info" href="index.php" role="button">Aller au tableau de bord</a>
   </p>
   <caption><legend>Véhicules</legend></caption>
     <div class="container">
       <!-- <p>
 	<a class="btn btn-primary" href="ajouter_vehicule.php" role="button">Créer un nouveau véhicule</a>
  <a class="btn btn-info" href="index.php" role="button">Aller au tableau de bord</a>
       </p> -->
       <?php
     if($num>0){
     ?>
 	<table class="table table-bordered table-hover table-striped">
 	<thead>
 	 <tr>
           <th>ID véhicule</th>
           <th>N°contrat</th>
           <th>Loueur</th>
           <th>Valeur d'achat</th>
           <th>1ère circulation</th>
           <th>Entrée parc</th>
           <th>Sortie parc</th>
           <th>Catégorie</th>
           <th>Marque</th>
           <th>Modèle</th>
           <th>Version</th>
           <th>N°chassis</th>
           <th>Boîte vitesse</th>
           <th>Puissance fiscale</th>
           <th>Nombre km</th>
           <th>Nombre portes</th>
           <th>Nombre places</th>
           <th>Réservoir</th>
           <th>Carburant</th>
           <th>Conso mixte</th>
           <th>Qté CO2</th>
           <th>Détention</th>
           <th>Loyer financier</th>
           <th>Loyer perte financière</th>
           <th>Loyer pneu</th>
           <th>Loyer autre</th>
           <th>Loyer total</th>
           <th>Commentaire</th>
           <th>Actions</th>
         </tr>
 	</thead>
 	  <tbody>
    <?php
      //Display collaborateur properties here
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
       ?>
      <tr>
        <?php echo "<td>{$id_immatveh}</td>" ?>
        <?php echo "<td>{$num_contrat}</td>" ?>
        <?php echo "<td>{$nom_loueur}</td>" ?>
        <?php echo "<td>{$val_achat}€</td>" ?>
        <?php echo "<td>{$prem_circulation}</td>" ?>
        <?php echo "<td>{$entree_parc}</td>" ?>
        <?php echo "<td>{$sortie_parc}</td>" ?>
        <?php echo "<td>{$cat_vehicule}</td>" ?>
        <?php echo "<td>{$marque}</td>" ?>
        <?php echo "<td>{$modele}</td>" ?>
        <?php echo "<td>{$version}</td>" ?>
        <?php echo "<td>{$no_chassis}</td>" ?>
        <?php echo "<td>{$boite_vitesse}</td>" ?>
        <?php echo "<td>{$puissance_fiscale}</td>" ?>
        <?php echo "<td>{$nb_km}km</td>" ?>
        <?php echo "<td>{$nb_portes}</td>" ?>
        <?php echo "<td>{$nb_places}</td>" ?>
        <?php echo "<td>{$reservoir}</td>" ?>
        <?php echo "<td>{$carburant}</td>" ?>
        <?php echo "<td>{$conso_mixte}</td>" ?>
        <?php echo "<td>{$qte_co2}</td>" ?>
        <?php echo "<td>{$detention}</td>" ?>
        <?php echo "<td>{$loyer_financier}€</td>" ?>
        <?php echo "<td>{$loyer_p_financiere}€</td>" ?>
        <?php echo "<td>{$loyer_pneu}€</td>" ?>
        <?php echo "<td>{$loyer_autre}€</td>" ?>
        <?php echo "<td>{$loyer_total}€</td>" ?>
        <?php echo "<td>{$commentaires}</td>" ?>
        <?php echo "<td width='100px'>
      	    <a class='btn btn-warning btn-sm' href='maj_vehicule.php?id={$id_immatveh}' role='button'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
      	    <a class='btn btn-danger btn-sm' href='del_vehicule.php?id={$id_immatveh}' role='button'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
                </td>" ?>
              </tr>
              <?php
              }
              ?>
              	</tbody>
                    </table>
              <?php
              $page_dom = "vehicules.php";
              include_once 'includes/pagination.veh.php';
              }
              else{
              ?>
              <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Attention!</strong> Vous n'avez aucun véhicule
              </div>
              <?php
              }
              ?>
                  </div>
                  <script src="js/jquery.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>
                </body>
              </html>
