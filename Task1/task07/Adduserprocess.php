<?php 
include 'function.php';
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$role=$_REQUEST['role'];
adduser($username,$password,$role);
header("location:index.php");
 ?>