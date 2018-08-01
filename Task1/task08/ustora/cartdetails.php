<?php  include 'Head.php' ;
include '../SimplaAdmin/Adminfunction.php' ;
include '../SimplaAdmin/config.php';
$id=$_REQUEST['id'];

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

   displaylist( $id);
  




	

  
function displaylist($id)
{
	$total=0;
$conn =new mysqli('localhost', 'root','', 'demo');
    
    $query="select * from Carts where id=$id";
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