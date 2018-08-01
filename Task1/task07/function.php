<?php 
function addproduct($id,$name,$price,$img)
{

$conn =new mysqli('localhost', 'root','', 'demo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="insert into products values($id,'$name',$price,'$img')";
if($conn->query($sql)==TRUE)
{
   echo "Record inserted Sucessfuly";
  

}
else
{
	echo "Eror inserting in table".$conn->error;
	
}

$conn->close();
}

function uploadFile($image,$imageTmp){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($image);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_dir . basename($image),PATHINFO_EXTENSION));
		        if (move_uploaded_file($imageTmp, $target_dir . basename($image) )) {
		        return basename($image);
		        //$image=basename($image);
		        } else {
		            echo "Sorry, there was an error uploading your file.";
		        }
			}

$products=array();
  function dispalyproducts()
  {     
  $products=array(); 
  	     $conn =new mysqli('localhost', 'root','', 'demo');

          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
		        }
  
 			 $dynamicList="<div class='container'><table class='table table-bordered table-hover'><tr><th>ID</th><th>Product NAME</th><th>ProductsPrice</th><th>ProductImage</th><th colspan='2'>Action</th></tr>";
					//sql="select * from products";
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
                    
                     $dynamicList.="<tr><td>".$id."</td>
                                    <td>".$product_name."</td> 
                                    <td>".$price."</td>
                                    <td><img src='uploads/".$img."'</td>
                                    <td><a href='index.php?id=".$id."&action=edit'>edit</a></td>
                                     <td><a href='upload.php?id=".$id."&action=delete'>delete</a></td>
                                    </tr>";
              
     		$pric=array('id' =>$id ,'name'=>$product_name,'img'=>$img );
                    array_push($products,$pric);
                      }
                      $dynamicList.="</table></div>";
			} 
			else {
    				$dynamicList = "We have no products listed in our store yet";
				}
                 //print_r($products);
				echo $dynamicList;
           


 	}

 	function updateproduct($id,$name,$price,$img)
 	{
 		$conn =new mysqli('localhost', 'root','', 'demo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="UPDATE products SET id=$id,name='$name',price=$price,img='$img' WHERE id=$id";
if($conn->query($sql)==TRUE)
{
   echo "Record updated Sucessfuly";
  

}
else
{
	echo "Eror updating in table".$conn->error;
	
}

$conn->close();



 	}

 	function deleteproduct($id)
 	{
    $conn =new mysqli('localhost', 'root','', 'demo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="delete from products  WHERE id=$id";
if($conn->query($sql)==TRUE)
{
   echo "Record deleted Sucessfuly";
  

}
else
{
	echo "Eror deleting in table".$conn->error;
	
}

$conn->close();



 	}
  function 	adduser($username,$password,$role)
  {
    $conn =new mysqli('localhost', 'root','', 'demo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="INSERT INTO `user`( `name`, `password`, `role`) VALUES ('$username','$password','$role')";

if($conn->query($sql)==TRUE)
{
   echo "Record inserted Sucessfuly";
  

}
else
{
	echo "Eror updating in table".$conn->error;
	
}

$conn->close();

  }
  function displayUser()
  {

  	$conn =new mysqli('localhost', 'root','', 'demo');

          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
		        }
  
 			 $dynamicList="<div class='container'><table class='table table-bordered table-hover'><tr><th>ID</th><th> NAME</th><th>Password</th><th>Role</tr>";
					//sql="select * from products";
				$query = "select * from user";
				$result = $conn->query($query);
				$productCount = $result->num_rows; // count the output amount
			if ($productCount > 0) 
			{
   			          while($row = $result->fetch_array(MYSQLI_ASSOC))
   			          { 
                     $id = $row["id"];
                     $product_name = $row["name"];
                     $price = $row["password"];
                     $img=$row["role"];
                    
                     $dynamicList.="<tr><td>".$id."</td>
                                    <td>".$product_name."</td> 
                                    <td>".$price."</td>
                                    <td>".$img."</td>
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
  function cart($username,$cart,$total)
{

$conn =new mysqli('localhost', 'root','', 'demo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="INSERT INTO `cart`( `username`, `cart`, `total`,`status`) VALUES ('$username','$cart','$total','placed')";
if($conn->query($sql)==TRUE)
{
   echo "<h1>ORDER IS placed Sucessfuly</h3>";
  

}
else
{
	echo "Eror inserting in table".$conn->error;
	
}

$conn->close();
}
function displaycart()
 {
$conn =new mysqli('localhost', 'root','', 'demo');

          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
		        }
  
 			 $dynamicList="<div class='container'><table class='table table-bordered table-hover'><tr><th>ID</th><th>username</th><th>Total</th><th>status</th></tr>";
					//sql="select * from products";
				$query = "select id,username,total,status from cart";
				$result = $conn->query($query);
				$productCount = $result->num_rows; // count the output amount
			if ($productCount > 0) 
			{
   			          while($row = $result->fetch_array(MYSQLI_ASSOC))
   			          { 
                     $id = $row["id"];
                     $username = $row["username"];
                     $price = $row["total"];
                     $status=$row["status"];
                    
                     $dynamicList.="<tr><td><a href='checkoutproduct.php?id=".$id."'>".$id."</a></td></td>
                                    <td>".$username."</td> 
                                    <td>".$price."</td>
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

?>