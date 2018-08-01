<?php
session_start();

include 'config.php';
$id = $_POST["id"];
$action=$_POST["action"];

if(isset($_SESSION['cart']))
{
$cart=$_SESSION['cart'];

}
else
{
	$cart=array();
}
$temp;

     switch($action)
     {
      case 'add':
     $cart=addtocart($id,$cart);
     break;
     case 'delete':
     $cart=deleteproduct($id,$cart);
     break;


      default:
      $cart=$_SESSION['cart'];
      //break;



     }





$_SESSION['cart']=$cart;
echo json_encode($cart);	






/*
foreach ($GLOBALS['products'] as $key => $val) {

	if($id==$val["id"])
	{
      
      $temp=$val;
      $temp["qt"]="1";
    //array_push(array($_SESSION["cart"]),$productid["id"],$productimg["img"],$productprice["price"]);
      
      
    

	}
}


if(check($id))
{
   foreach ($GLOBALS['cart'] as $key => $val) {

	if($id==$val["id"])
	{

		
		$cart[$key]["qt"]=($val["qt"])+1;

	}

}
$_SESSION['cart']=$cart;
echo json_encode($cart);	
		
}
else
{

array_push($cart,$temp);
$_SESSION['cart']=$cart;
 
echo json_encode($cart);
//echo json_encode($_SESSION["cart"]);

}

 function check($id){
 	$a=false;
foreach ($GLOBALS['cart'] as $key => $val) {

	if($id==$val["id"])
	{
  
      $a=true;

    }
 
}
return $a;
}
*/







?>