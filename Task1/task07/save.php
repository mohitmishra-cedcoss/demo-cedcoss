<?php  
session_start();
include 'function.php';

$total=$_REQUEST['total'];
($_SESSION['user']);
($_SESSION['cart']);
if(isset($_SESSION['user']))
{

$username=$_SESSION['user']['name'];
$cart=json_encode($_SESSION['cart']);
$total=$_REQUEST['total'];
cart($username,$cart,$total);
 unset($_SESSION['cart']);
}
else
{

	header("location:admin.php");
}






?>