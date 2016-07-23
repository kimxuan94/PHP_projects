<?php
// http://www.php.net/manual/fr/function.spl-autoload-register.php
// http://www.php5-tutorial.com/classes/static-classes/
// http://www.manuelphp.com/php/language.oop5.autoload.php

//*
// abstract class Animal //  rendrai la classe ininstantiable - seul une classe enfant pourrai l'instancier
// final class Animal // ne peut pas être étandu (pas de classe enfant possible)
class Animal
{
	// Private - uniquement dans la classe. 
	// Protected - uniquement dans la classe et les classes enfants. 
	// Public - (par defaut)

	// Le fait de déclarer des membres ou des méthodes comme statiques 
	// vous permet d'y accéder sans avoir besoin d'instancier la classe.
	public static $pi = "3.14";
	public static function aStaticMethod() {
        // ...
    }
	
    const MinimumPasswordLength = 6; // Déclare une constante
	
	public $name = "No-name animal";
	
	public function Greet()
    {
        return "Hello, I'm some sort of animal and my name is " . $this->name;
    }
    
	public function Describe()
    {
        return $this->name . ", " . $this->age . " years old";    
    }
	
	public function __construct($name="f") // met les variables
    {
        $this->name = $name;
    }
	 
	public function __destruct()
    {
        echo "<br>I'm dead now :(";
    }
}

class Dog extends Animal
{
    public function Greet() // cette fonction est simplement reécrite
    {
        return "Hello, I'm a dog and my name is " . $this->name;
    }
	
    public function Describe()
    {
        return parent::Describe() . ", and I'm a dog!";  // appele une fonction de la classe parente  
    }
	
	final public function fin() // ne peut être remplassée
    {
        return "The final word!";    
    }
}

echo Animal::$pi . "<br>";
echo "The minimum password length is " . Animal::MinimumPasswordLength; // affiche une constante
//$animal = new Animal("lion"); // passe une variable à __construct($var)
//echo $animal->name;
$animal = new Animal(); // instantiation de la classe Animal
echo $animal->Greet();

$animal = new Dog();
$animal->name = "Bob";
echo $animal->Greet();
echo $animal->Describe();
//*/

/*
class SubObject 
{
  static $instances = 0;
  public $instance;

  public function __construct() {
    $this->instance = ++self::$instances;
  }

  public function __clone() {
    $this->instance = ++self::$instances;
  }
}

class MyCloneable 
{
 // public $object1;
 // public $object2;

  function __clone() 
  {    
    // Force la copie de this->object, sinon
    // il pointera vers le même objet.
    $this->object1 = clone($this->object1);
  }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print("Objet original :\n"); echo "<pre>"; print_r($obj); echo "</pre>";

print("Objet cloné :\n"); echo "<pre>"; print_r($obj2); echo "</pre>";

//*/
?>