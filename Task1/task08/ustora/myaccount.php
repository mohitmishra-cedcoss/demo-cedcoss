<?php  include 'Head.php' ;
include '../SimplaAdmin/Adminfunction.php' ;
include '../SimplaAdmin/config.php';
?>

	<style type="text/css">

   
	</style>
	
		<div class="container">
            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Password</th>
        <th>img</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $_SESSION['user']['name'];?></td>
        <td><?php echo $_SESSION['user']['pass'];?></td>
        <td><?php echo "<img src='../uploads/".$_SESSION['user']['img']."'  width='3%'alt='".$_SESSION['user']['img']." '>";?></td>
      </tr>
    </tbody>
  </table>


  <h1>Cart Details</h1>
<?php  
$name=$_SESSION['user']['name'];
   //displaylist( $name);
    displaycart($name);
function displaycart($name)
 {
$conn =new mysqli('localhost', 'root','', 'demo');

          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
		        }
  
 			 $dynamicList="<div class='container'><table class='table table-bordered table-hover'><tr><th>ID</th><th>username</th><th>status</th></tr>";
					//sql="select * from products";
				$query = "select id,username,status from Carts where username='$name'";
				$result = $conn->query($query);
				$productCount = $result->num_rows; // count the output amount
			if ($productCount > 0) 
			{
   			          while($row = $result->fetch_array(MYSQLI_ASSOC))
   			          { 
                     $id = $row["id"];
                     $username = $row["username"];
                    
                     $status=$row["status"];
                    
                     $dynamicList.="<tr><td><a href='cartdetails.php?id=".$id."'>".$id."</a></td></td>
                                    <td>".$username."</td> 
                                
                                    <td>".$status."</td>
                                    </tr>";
                                   
              
     		//$pric=array('id' =>$id ,'name'=>$product_name,'img'=>$img );
                   // array_push($products,$pric);
                      }
                      $dynamicList.="</table></div>";
			} 
			else {
    				$dynamicList = "We have no products listed in our store yet";
				}
                 //print_r($products);
				echo $dynamicList;
           







 }





	

  
function displaylist($name)
{
	$total=0;
$conn =new mysqli('localhost', 'root','', 'demo');
    
    $query="select * from Carts where username='$name'";
		$result = $conn->query($query);
				// count the output amount
			
   			          while($row = $result->fetch_array(MYSQLI_ASSOC))
   			          { 
                     $product = $row["cart"];
                   
                     }

                 
                 $pro=json_decode($product,true);
                 
                    // print_r($pro);
                 $table="<table  class=table table-bordered'><tr><th>ID</th><th>Name</th><th>Image</th><th>price</th><th>Quantity</th></tr>";
                 
    foreach ($pro as $key => $val) 
    {
 	       
 		
             $table.="<tr><td>".$val["id"]."</td>
                        <td>".$val["name"]."</td>
                        <td><img width='20%' src='../uploads/".$val["img"]."'></td>
                        <td>".$val["price"]."</td>
                        <td>".$val["qt"]."</td></tr>";
                       
			


    $total=$total+$val['qt']*$val['price'];
 	
   }
   $table.="<tr><td>total</td><td>".$total."</td></tr></table>";
   echo $table;
      }

//include 'footer.php';
 ?>



















<?php //include 'footer.php' ?>