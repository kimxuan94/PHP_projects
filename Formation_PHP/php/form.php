<?php

// 
if(isset($_GET['page']) && $_GET['page'] != ''){$page = $_GET['page'];}
else if(isset($_POST['page']) && $_POST['page'] != ''){$page = $_POST['page'];}else{$page = '';}

$postlist = array(
	'nom',
	'prenom'
);
foreach( $postlist as $val ){(isset($_POST[$val]))?$$val=$_POST[$val]:$$val='';}

?>