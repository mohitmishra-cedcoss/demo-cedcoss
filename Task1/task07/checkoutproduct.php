<?php
$id=$_REQUEST['id'];

  displaylist($id);
function displaylist($id)
{
	$total=0;
$conn =new mysqli('localhost', 'root','', 'demo');
    
    $query="select * from cart where id=$id";
		$result = $conn->query($query);
				$productCount = $result->num_rows; // count the output amount
			if ($productCount > 0) 
			{
   			          while($row = $result->fetch_array(MYSQLI_ASSOC))
   			          { 
                     $product = $row["cart"];
                   
                     }
                 }
                 $pro=json_decode($product,true);

                 $table="<table><tr><th>ID</th><th>Name</th><th>Image</th><th>price</th><th>Quantity</th></tr>";
                 
    foreach ($pro as $key => $val) 
    {
 	       
 		
             $table.="<tr><td>".$val["id"]."</td>
                        <td>".$val["name"]."</td>
                        <td><img src='uploads/".$val["img"]."'></td>
                        <td>".$val["price"]."</td>
                        <td>".$val["qt"]."</td></tr>";
                       
			


    $total=$total+$val['qt']*$val['price'];
 	
   }
   $table.="<tr><td>total</td><td>".$total."</td></tr></table>";
   echo $table;
      }

?>