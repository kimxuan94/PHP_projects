<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
//Including our class script
include("class_lib.php");

  /*Instanciate class mean create object
  * new is a keyword which allows to create new object
  */
  $ophelie = new person();
  $yohann = new person;

  //Instanciate class with method constructor
  $justine = new person("Justine Toumine");
  echo "Justine is a new person and her full name is: " .$justine->get_name() . "<br />";

  //Set propertie to our object
  $ophelie->set_name("Ophelie Toumine");
  $yohann->set_name("Yohann Toumine");

  /* Now get property from our object
  * So we're displaying result
  */
  echo "Ophelie's full name: " . $ophelie->get_name(). "<br />";
  echo "Yohann's full name:  " . $yohann->get_name(). "<br />";

  $name = $ophelie->name;
  echo "Same result: " . $name;

//Test when trying to access to private property
  echo "Tell me private stuff: ".$justine->pinn_number;
?>
