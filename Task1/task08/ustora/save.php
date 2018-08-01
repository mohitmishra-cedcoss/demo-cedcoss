<?php  
session_start();
 include  '../SimplaAdmin/config.php' ;
 include '../SimplaAdmin/Adminfunction.php' ;
//include 'function.php';


//($_SESSION['user']);
 ($_SESSION['cart']);
if(isset($_SESSION['user']))
{

$username=$_SESSION['users']['name'];
$cart=json_encode($_SESSION['cart']);

//cart($username,$cart,$total);
 //unset($_SESSION['cart']);
}
else
{
   echo "hello";
	//header("location:checkout.php");
}






?>