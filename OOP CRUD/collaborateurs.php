<?php
header('Content-Type: charset=utf-8');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 5;

$from_record_num = ($records_per_page * $page) - $records_per_page;

include_once 'includes/config.php';
include_once 'includes/collaborateur.inc.php';

// error_reporting(E_ALL);
// ini_set('display_errors', true);


//Set connection to Database
$database = new Connection();
$db = $database->getConnection();

$collaborateur = new Collaborateur($db);

$stmt = $collaborateur->readAll($page, $from_record_num, $records_per_page);
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
<a class="btn btn-primary" href="ajouter_collaborateur.php" role="button">Créer un nouveau collaborateur</a>
<a class="btn btn-info" href="index.php" role="button">Aller au tableau de bord</a>
   </p>
   <caption><legend>Collaborateurs</legend></caption>
     <div class="container">

       <!-- <p>
 	<a class="btn btn-primary" href="ajouter_collaborateur.php" role="button">Créer un nouveau collaborateur</a>
  <a class="btn btn-info" href="index.php" role="button">Aller au tableau de bord</a>
       </p> -->
       <?php
     if($num>0){
     ?>
 	<table class="table table-bordered table-hover table-striped">
 	<thead>
 	 <tr>
           <th>ID RH</th>
           <th>Nom</th>
           <th>Prenom</th>
           <th>Adresse</th>
           <th>Code postal</th>
           <th>Ville</th>
           <th>Telephone</th>
           <th>Profession Biocodex</th>
           <th>Justificatif (.pdf)</th>
           <th>Avantages financier</th>
           <th>Date entrée</th>
           <th>Date sortie</th>
           <th>Commentaire</th>
           <th>Actions</th>
         </tr>
 	</thead>
 	  <tbody>
    <?php
      //Display collaborateur properties here
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      file_put_contents('.jpeg',$justificatif);
//       $DT = new DateTimeFrench($date_entree->date_entree);
//       echo $DT->format('l j F Y'), '<br />';
       ?>
      <tr>
        <?php echo "<td>{$id_matrh}</td>" ?>
        <?php echo "<td>{$nom}</td>" ?>
        <?php echo "<td>{$prenom}</td>" ?>
        <?php echo "<td>{$adresse}</td>" ?>
        <?php echo "<td>{$code_postal}</td>" ?>
        <?php echo "<td>{$ville}</td>" ?>
        <?php echo "<td>{$telephone}</td>" ?>
        <?php echo "<td>{$profession}</td>" ?>
        <?php echo "<td><img src='{$justificatif}.jpeg'></td>" ?>
        <?php echo "<td>{$avantage_nature}€</td>" ?>
        <?php echo "<td>{$date_entree}</td>" ?>
        <?php echo "<td>{$date_sortie}</td>" ?>
        <?php echo "<td>{$commentaires}</td>" ?>
        <?php echo "<td width='100px'>
      	    <a class='btn btn-warning btn-sm' href='maj_collaborateur.php?id={$id_matrh}' role='button'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
      	    <a class='btn btn-danger btn-sm' href='del_collaborateur.php?id={$id_matrh}' role='button'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
                </td>" ?>
              </tr>
              <?php
              }
              ?>
              	</tbody>
                    </table>
              <?php
              $page_dom = "collaborateurs.php";
              include_once 'includes/pagination.inc.php';
              }
              else{
              ?>
              <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Attention!</strong> Vous n'avez aucun collaborateur
              </div>
              <?php
              }
              ?>
                  </div>
                  <script src="js/jquery.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>
                </body>
              </html>
