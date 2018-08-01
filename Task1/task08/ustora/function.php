<?php 
include  '../SimplaAdmin/config.php';
 include '../SimplaAdmin/Adminfunction.php' ;
 $product=Product();
 global $product;
function addtocart(pid,cart)
{
	
 global $product;
  if(chek($pid))
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


      	foreach ($product as $key => $val) 
     	{
   	 		if($pid==$val["id"])
   	 		{
         	array_push($cart,$val);

      		}

     	}
   	}
   	return $cart;
}
      

      
    



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











 ?>