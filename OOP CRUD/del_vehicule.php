<?php
	include_once 'includes/config.php';
	include_once 'includes/vehicule.inc.php';

	// Set database connection
	$database = new Connection();
	$db = $database->getConnection();

	// prepare collaborateur object
	$vehicule = new Vehicule($db);

	// set product collaborateur to be deleted
	$vehicule->id = isset($_GET['id']) ? $_GET['id'] : die('Erreur avec l\'ID collaborateur');

	// delete the product
	if($vehicule->deleteVehicule()){
		echo "<script>location.href='vehicules.php'</script>";
	}

	// if unable to delete the product
	else{
		echo "<script>alert('Erreur lors de la suppression')</script>";

	}
?>
