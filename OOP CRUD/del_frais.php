<?php
	include_once 'includes/config.php';
	include_once 'includes/frais.inc.php';

	// Set database connection
	$database = new Connection();
	$db = $database->getConnection();

	// prepare collaborateur object
	$frais = new Frais($db);

	// set product collaborateur to be deleted
	$frais->id = isset($_GET['id']) ? $_GET['id'] : die('Erreur avec l\'ID collaborateur');

	// delete the product
	if($frais->deleteFrais()){
		echo "<script>location.href='frais.php'</script>";
	}

	// if unable to delete the product
	else{
		echo "<script>alert('Erreur lors de la suppression')</script>";

	}
?>
