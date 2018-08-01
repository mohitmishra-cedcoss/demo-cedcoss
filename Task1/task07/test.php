<?php 
 class Myclass1{

public $prop1 = "I'm a class property!";
 
  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }
 
  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}
 
$obj = new MyClass1;
 
echo $obj->prop1;
 $obj->setProperty("I am free now<br>");
echo $obj->getProperty();


 ?>
 <?php
 
class MyClass
{
  public $prop1 = "I'm a class property!";
 
  public function __construct()
  {
      echo 'The class "', __CLASS__, '" was initiated!<br />';
  }
  public function __destruct()
  {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
  }
 
  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }
 
  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}

class MyOtherClass extends MyClass
{
  public function newMethod()
  {
      echo "From a new method in " . __CLASS__ . ".<br />";
  }
}
 
// Create a new object
$obj = new MyOtherClass;
 
// Get the value of $prop1
echo $obj->getProperty();
   //echo $obj->newMethod();
// Output a message at the end of the file
echo "End of file.<br />";
 
?>