<?php 
$products=array(
	          "product-101"=>array(
	          	             "id"=>"101",
	          	             "img"=>"football",
	          	             "price"=>"150"   
                                 ),
                              array(
	          	             "id"=>"102",
	          	             "img"=>"tennis",
	          	             "price"=>"120"   
                                 ),
                              array(
	          	             "id"=>"103",
	          	             "img"=>"basketball",
	          	             "price"=>"90"   
                                 ),
                              array(
	          	             "id"=>"104",
	          	             "img"=>"table-tennis",
	          	             "price"=>"120"   
                                 ),
                              array(
	          	             "id"=>"105",
	          	             "img"=>"soccer",
	          	             "price"=>"80"   
                                 )

	          	               

	          	                 );

   

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

     $temp=0;
      	foreach ($GLOBALS['products'] as $key => $val) 
     	{
   	 		if($pid==$val["id"])
   	 		{
              $temp=$val;
              $temp["qt"]="1";
         	array_push($cart,$temp);

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


?>