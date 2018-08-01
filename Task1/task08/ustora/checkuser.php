<?php  
session_start();
include '../SimplaAdmin/Adminfunction.php' ;
include '../SimplaAdmin/config.php';
if(isset($_SESSION['user']))
{
   $username=$_SESSION['user']['name'];
   echo $username;
$cart=json_encode($_SESSION['cart']);
 
cart($username,$cart);
unset($_SESSION['cart']);
header("location:checkout.php?msg=Your Order is Placed Sucessfuly");

}
else
{


header("location:checkout.php?msg=You Must Login First");

}

function cart($username,$cart)
{

$conn =new mysqli('localhost', 'root','', 'demo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="INSERT INTO `Carts`( `username`, `cart`,`status`) VALUES ('$username','$cart','placed')";
if($conn->query($sql)==TRUE)
{
   echo "<h1>ORDER IS placed Sucessfuly</h1>";
  

}
else
{
	echo "Eror inserting in table".$conn->error;
	
}

$conn->close();
}



?>