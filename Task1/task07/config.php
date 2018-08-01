<?php 
/*$products=array(
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
                               */
function getarray()
{ 
  $product = array();
 $conn =new mysqli('localhost', 'root','', 'demo');

          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
            }
            $query = "select * from products";
        $result = $conn->query($query);
        $productCount = $result->num_rows; // count the output amount
      if ($productCount > 0) 
      {
                  while($row = $result->fetch_array(MYSQLI_ASSOC))
                  { 
                     $id = $row["id"];
                     $product_name = $row["name"];
                     $price = $row["price"];
                     $img=$row["img"];
                    $pric=array('id' =>$id ,'name'=>$product_name,'img'=>$img,'price'=>$price);
                    array_push($product,$pric);
                  }
      }
      return $product;
  }


function addtocart($pid,$cart)
{
	
  $product_array=array();
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
     
      $product_array=getarray();
      //print_r(getarray());
      	foreach ($product_array as $key => $val) 
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