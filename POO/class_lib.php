<?php

  /*
  * First Class
  * $name is a property
  * function in OOP is a method
  * $this is a pointor
  */
  class person {
      var $name;

      /*This a encapsulation principle
      * It restricts properties access with keywords:
      * @public; @private; @protected
      */

      //Declare property with var keywords is public
      public $height; //@public free access everywhere
      protected $social_insurance; //@protected allow access in class and inheritance class
      private $pinn_number;//@private allows only access in class

      /*
      * Class constructor give properties values after creation of object
      * __construct is a OOP method which alows to create object constructor
      */
      function __construct($persons_name){
        $this->name = $persons_name;
      }


      //Setter
      function set_name($new_name) {
        $this->name = $new_name;
      }
      //Getter
      function get_name() {
        return $this->name;
      }

      private function get_pinn_number() {
        return
        $this->pinn_number;
      }
  }
?>
