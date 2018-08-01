<?php
session_start();
 include '../SimplaAdmin/Adminfunction.php' ;
include '../SimplaAdmin/config.php';

$id =isset($_POST["id"]) ? $_POST["id"]: 0;
$qt =isset($_POST["qt"]) ? $_POST["qt"]: 0;
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
     
     case 'update':
     $cart=updateproduct($id,$cart,$qt);
     break;

      default:
      $cart=$_SESSION['cart'];
      //break;



     }








function addtocart($pid,$cart)
{
    
 
  if(check($pid))
  {
   foreach ($cart as $key => $val) 
   {
     if($pid==$val["id"])
     {
        $cart[$key]["qt"]+=1;  

      }
  }
}
      else
      {


        foreach (Product() as $key => $val) 
        {
            if($pid==$val["id"])
            {
                $val['qt']=1;
            array_push($cart,$val);

            }

        }
    }
    return $cart;
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

function deleteproduct($pid,$cart)
{

foreach ($cart as $key => $val) 
   {
     if($pid==$val["id"])
     {
       unset($cart[$key]);
     }
 }
 $cart=array_values($cart);
 return $cart;
}

function updateproduct($pid,$cart,$qt)
{
foreach ($cart as $key => $val) 
   {
     if($pid==$val["id"])
     {
        $cart[$key]["qt"]=$qt;  

      }
  }
  return $cart;

}





$_SESSION['cart']=$cart;
echo json_encode($cart);  
?> 