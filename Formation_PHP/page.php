<?php
session_start(); //Demarrer la session
require 'php\form.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<?php
			require 'php\header.php';
			require 'php\menu.php';
			if ($page == 1){require 'php\page1.php';}
			elseif ($page == 2) {require 'php\page2.php';}
			else {require 'php\acceuil.php';}
		?>
		</form>
	</body>
</html>