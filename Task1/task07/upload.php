<?php 
include 'function.php';
//$id=$_REQUEST['id'];
//$name=$_REQUEST['name'];
//$price=$_REQUEST['price'];
$action=$_REQUEST['action'];
$img="";


echo $img;
switch($action)
{
   case 'add':
   $id=$_REQUEST['id'];
   $name=$_REQUEST['name'];
   $price=$_REQUEST['price'];
   $image=$_FILES['image']['name'];
   $imageTmp=$_FILES['image']['tmp_name'];
   $img=uploadFile($image,$imageTmp);
   addproduct($id,$name,$price,$img); 
  header("location:index.php");
   break;
   case  'update':
   $id=$_REQUEST['newproductid'];
   $name=$_REQUEST['newproductname'];
   $price=$_REQUEST['newproductprice'];
   $image=$_FILES['productimage']['name'];
   $imageTmp=$_FILES['productimage']['tmp_name'];
     $img=uploadFile($image,$imageTmp);
   updateproduct($id,$name,$price,$img); 
   header("location:index.php");
   break;
   case 'delete':
   $id=$_REQUEST['id'];
   deleteproduct($id);
   header("location:index.php");
}



//header("location:index.php");
?>
