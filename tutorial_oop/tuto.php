<?php
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// }
// $obj = new MyClass;
// var_dump($obj);
// echo "----------------------------------------------------------------------";
?>


<?php
// echo "-------------------------------Getter and Setter---------------------------------------<br>";
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function setProperty($newval)
// {
// $this->prop1 = $newval;
// }
// public function getProperty()
// {
// return $this->prop1 . "<br />";
// }
// }
// $obj = new MyClass;
// echo $obj->prop1;
?>

<?php
// echo "-------------------------------Make use of setter and getter---------------------------------------<br>";
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function setProperty($newval)
// {
// $this->prop1 = $newval;
// }
// public function getProperty()
// {
// return $this->prop1 . "<br />";
// }
// }
// $obj = new MyClass;
// echo $obj->getProperty(); // Get the property value
// $obj->setProperty("I'm a new property value!"); // Set a new one
// echo $obj->getProperty(); // Read it out again to show the change
?>

<?php 
    // class MyClass
    // {
    // public $prop1 = "I'm a class property!";
    // public function setProperty($newval)
    // {
    // $this->prop1 = $newval;
    // }
    // public function getProperty()
    // {
    // return $this->prop1 . "<br />";
    // }
    // }
    // // Create two objects
    // $obj = new MyClass;
    // $obj2 = new MyClass;
    // // Get the value of $prop1 from both objects
    // echo $obj->getProperty();
    // echo $obj2->getProperty();
    // // Set new values for both objects
    // $obj->setProperty("I'm a new property value!");
    // $obj2->setProperty("I belong to the second instance!");
    // // Output both objects' $prop1 value
    // echo $obj->getProperty();
    // echo $obj2->getProperty();
?>

<?php
    // class MyClass
    // {
    // public $prop1 = "I'm a class property!";
    // public function __construct()
    // {
    // echo 'The class "', __CLASS__, '" was initiated!<br />';
    // }
    // public function setProperty($newval)
    // {
    // $this->prop1 = $newval;
    // }
    // public function getProperty()
    // {
    // return $this->prop1 . "<br />";
    // }
    // }
    // // Create a new object
    // $obj = new MyClass;
    // // Get the value of $prop1
    // echo $obj->getProperty();
    // // Output a message at the end of the file
    // echo "End of file.<br />";
?>

<?php
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function __construct()
// {
// echo 'The class "', __CLASS__, '" was initiated!<br />';
// }
// public function __destruct()
// {
// echo 'The class "', __CLASS__, '" was destroyed.<br />';
// }
// public function setProperty($newval)
// {
// $this->prop1 = $newval;
// }
// public function getProperty()
// {
// return $this->prop1 . "<br />";
// }
// }
// // Create a new object
// $obj = new MyClass;
// // Get the value of $prop1
// echo $obj->getProperty();
// // Destroy the object
// unset($obj);
// // Output a message at the end of the file
// echo "End of file.<br />";
?>

<?php
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function __construct()
// {
// echo 'The class "', __CLASS__, '" was initiated!<br />';
// }
// public function __destruct()
// {
// echo 'The class "', __CLASS__, '" was destroyed.<br />';
// }
// public function setProperty($newval)
// {
// $this->prop1 = $newval;
// }
// public function getProperty()
// {
// return $this->prop1 . "<br />";
// }
// public function __toString()
// {
// echo "Using the toString method: ";
// return $this->getProperty();
// }
// }
// // Create a new object
// $obj = new MyClass;
// // Output the object as a string
// echo $obj;
// // Destroy the object
// unset($obj);
// // Output a message at the end of the file
// echo "End of file.<br />";
?>

<?php
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function __construct()
// {
// echo 'The class "', __CLASS__, '" was initiated!<br />';
// }
// public function __destruct()
// {
// echo 'The class "', __CLASS__, '" was destroyed.<br />';
// }
// public function __toString()
// {
// echo "Using the toString method: ";
// return $this->getProperty();
// }
// public function setProperty($newval)
// {
// $this->prop1 = $newval;
// }
// public function getProperty()
// {
// return $this->prop1 . "<br />";
// }
// }
// class MyOtherClass extends MyClass
// {
// public function newMethod()
// {
// echo "From a new method in " . __CLASS__ . ".<br />";
// }
// }
// // Create a new object
// $newobj = new MyOtherClass;
// // Output the object as a string
// echo $newobj->newMethod();
// // Use a method from the parent class
// echo $newobj->getProperty();
?>

<?php
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function __construct()
// {
// echo 'The class "', __CLASS__, '" was initiated!<br />';
// }
// public function __destruct()
// {
// echo 'The class "', __CLASS__, '" was destroyed.<br />';
// }
// public function __toString()
// {
// echo "Using the toString method: ";
// return $this->getProperty();
// }
// public function setProperty($newval)
// {
// $this->prop1 = $newval;
// }
// public function getProperty()
// {
// return $this->prop1 . "<br />";
// }
// }
// class MyOtherClass extends MyClass{
//     public function __construct()
//     {
//     echo "A new constructor in " . __CLASS__ . ".<br />";
//     }
//     public function newMethod()
//     {
//     echo "From a new method in " . __CLASS__ . ".<br />";
//     }
//     }
//     // Create a new object
//     $newobj = new MyOtherClass;
//     // Output the object as a string
//     echo $newobj->newMethod();
//     // Use a method from the parent class
//     echo $newobj->getProperty();
?>

<?php
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function __construct(){
//     echo 'The class "', __CLASS__, '" was initiated!<br />';
//     }
//     public function __destruct()
//     {
//     echo 'The class "', __CLASS__, '" was destroyed.<br />';
//     }
//     public function __toString()
//     {
//     echo "Using the toString method: ";
//     return $this->getProperty();
//     }
//     public function setProperty($newval)
//     {
//     $this->prop1 = $newval;
//     }
//     public function getProperty()
//     {
//     return $this->prop1 . "<br />";
//     }
//     }
//     class MyOtherClass extends MyClass
//     {
//     public function __construct()
//     {
//     parent::__construct(); // Call the parent class's constructor
//     echo "A new constructor in " . __CLASS__ . ".<br />";
//     }
//     public function newMethod()
//     {
//     echo "From a new method in " . __CLASS__ . ".<br />";
//     }
//     }
//     // Create a new object
//     $newobj = new MyOtherClass;
//     // Output the object as a string
//     echo $newobj->newMethod();
//     // Use a method from the parent class
//     echo $newobj->getProperty();
    ?>

<?php
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function __construct(){
//     echo 'The class "', __CLASS__, '" was initiated!<br />';
//     }
//     public function __destruct()
//     {
//     echo 'The class "', __CLASS__, '" was destroyed.<br />';
//     }
//     public function __toString()
//     {
//     echo "Using the toString method: ";
//     return $this->getProperty();
//     }
//     public function setProperty($newval)
//     {
//     $this->prop1 = $newval;
//     }
//     protected function getProperty()
//     {
//     return $this->prop1 . "<br />";
//     }
//     public function callProtected()
//     {
//     return $this->getProperty();
//     }
//     }
//     class MyOtherClass extends MyClass
//     {
//     public function __construct()
//     {
//     parent::__construct();
//     echo "A new constructor in " . __CLASS__ . ".<br />";
//     }
//     public function newMethod()
//     {
//     echo "From a new method in " . __CLASS__ . ".<br />";
//     }
//     }
//     // Create a new object
//     // $newobj = new MyOtherClass;
//     $newobj = new MyClass;
//     // Attempt to call a protected method
//     echo $newobj->callProtected();
    ?>

    <?php
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public function __construct()
// {
// echo 'The class "', __CLASS__, '" was initiated!<br />';
// }
// public function __destruct()
// {
// echo 'The class "', __CLASS__, '" was destroyed.<br />';
// }
// public function __toString()
// {
// echo "Using the toString method: ";
// return $this->getProperty();
// }
// public function setProperty($newval)
// {
// $this->prop1 = $newval;
// }
// protected function getProperty()
// {
// return $this->prop1 . "<br />";
// }
// }
// class MyOtherClass extends MyClass
// {
// public function __construct()
// {
// parent::__construct();
// echo "A new constructor in " . __CLASS__ . ".<br />";
// }
// public function newMethod()
// {
// echo "From a new method in " . __CLASS__ . ".<br />";
// }
// public function callProtected()
// {
// return $this->getProperty();
// }
// }
// // Create a new object
// $newobj = new MyOtherClass;
// // Call the protected method from within a public method
// echo $newobj->callProtected();
?>

<?php
// class MyClass
// {public $prop1 = "I'm a class property!";
//     public function __construct()
//     {
//     echo 'The class "', __CLASS__, '" was initiated!<br />';
//     }
//     public function __destruct()
//     {
//     echo 'The class "', __CLASS__, '" was destroyed.<br />';
//     }
//     public function __toString()
//     {
//     echo "Using the toString method: ";
//     return $this->getProperty();
//     }
//     public function setProperty($newval)
//     {
//     $this->prop1 = $newval;
//     }
//     private function getProperty()
//     {
//     return $this->prop1 . "<br />";
//     }
//     }
//     class MyOtherClass extends MyClass
//     {
//     public function __construct()
//     {
//     parent::__construct();
//     echo "A new constructor in " . __CLASS__ . ".<br />";
//     }
//     public function newMethod()
//     {
//     echo "From a new method in " . __CLASS__ . ".<br />";
//     }
//     public function callProtected()
//     {
//     return $this->getProperty();
//     }
//     }
//     // Create a new object
//     $newobj = new MyOtherClass;
//     // Use a method from the parent class
//     echo $newobj->callProtected();
?>    
    
<?php 
// class MyClass
// {
// public $prop1 = "I'm a class property!";
// public static $count = 0;
// public function __construct()
// {
// echo 'The class "', __CLASS__, '" was initiated!<br />';
// }
// public function __destruct()
// {
// echo 'The class "', __CLASS__, '" was destroyed.<br />';
// }public function __toString()
// {
// echo "Using the toString method: ";
// return $this->getProperty();
// }
// public function setProperty($newval)
// {
// $this->prop1 = $newval;
// }
// private function getProperty()
// {
// return $this->prop1 . "<br />";
// }
// public static function plusOne()
// {
// return "The count is " . ++self::$count . ".<br />";
// }
// }
// class MyOtherClass extends MyClass
// {
// public function __construct()
// {
// parent::__construct();
// echo "A new constructor in " . __CLASS__ . ".<br />";
// }
// public function newMethod()
// {
// echo "From a new method in " . __CLASS__ . ".<br />";
// }
// public function callProtected()
// {
// return $this->getProperty();
// }
// }
// do
// {
// // Call plusOne without instantiating MyClass
// echo MyClass::plusOne();
// } while ( MyClass::$count < 10 );
?>
