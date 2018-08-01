<?php
include 'function.php';
$action='';
if(isset($_REQUEST['id']))
{
$id=$_REQUEST['id'];

}
if(isset($_REQUEST['action']))
{
	$action=$_REQUEST['action'];

}
$identity='';
switch($action)
{

	case 'edit':
	$productid=$id;
     $conn =new mysqli('localhost', 'root','', 'demo');

          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
		        }
		        $query = "select * from products";
				$result = $conn->query($query);
				$productCount = $result->num_rows; 
				while($row = $result->fetch_array(MYSQLI_ASSOC))
   			          { 
                     if($productid==$row["id"])
                     {
                       $productname=$row["name"];
                       $productprice=$row["price"];
                       $productimage=$row["img"];
                     }
                 }
           echo "<form action='upload.php' enctype='multipart/form-data' method='POST'>
           id:<input type='text' value='".$productid."' name='newproductid'></input>
           Name:<input type='text' value='".$productname."' name='newproductname'></input>
           Price:<input type='text' value='".$productprice."' name='newproductprice'></input>
           image<input type='file' value='uploads/".$productimage."' name='productimage' id='productimage'></input>
            <input type='submit' name='action' value='update'></input>
           </form>

           ";
     

	break;
	default:
	//code
	break;
}



?> 
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
     
     img
     {
     	width:5%;
     	height:5%;
     	
     }

	</style>
</head>
<body><div style="float: right;font-size:20px;"><span><a href="logout.php">logout</a><span></div>
	 <div class="wrapper">
	 <form action="upload.php" method="POST" enctype="multipart/form-data">
     <label>id:<input type="text" name="id"></input><br/></label>
     <label>NAME:<input type="text" name="name"></input></label>
     <label>PRICE:<input type="text" name="price"></input></label>
    <label>image:<input type="file" name="image" id="image"></input></label>
     <label><input type="submit" name="action" value="add"></input></label>
      </form>
      <div style="float: right;font-size:20px;"><span><a href="adduser.php">Add users</a><span></div>
       <div style="float: right;font-size:20px;"><span><a href="checkout.php">Order details</a><span></div>
     
</div>
<div ><?php dispalyproducts();  ?></div>
</body>
</html>
     



	