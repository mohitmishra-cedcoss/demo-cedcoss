<?php
session_start();
if(isset($_SESSION['cart']))
{
$product=$_SESSION['cart'];
$mytable="<table><tr><th>ProductID</th><th>ProductImage</th><th>ProductName</th><th>ProductPrice</th><th>Quantity</th></tr>";
$total=0;
foreach ($product as $key => $value) 
{
	$mytable.="<tr>
		<td>".$value["id"]."</td>
		
		<td><img src='uploads/".$value["img"]."'></td>
		<td>".$value["name"]."</td>
		<td>".$value["price"]."</td>
		<td>".$value["qt"]."</td>

		</tr>";
		 $total=$total+$value['qt']*$value['price'];
}
$mytable.="<tr><td colspan='3'>total</td><td>".$total."</td>
            <td><a href=Proceed</td>
            <td><a href='save.php?total=".$total."'>SAVE order</a></td></tr></table>";
echo $mytable;
}
else
{
	$mytable="<table><tr><th>ProductID</th><th>ProductImage</th><th>ProductName</th><th>ProductPrice</th><th>Quantity</th></tr>";
	$mytable.="<tr><td><h3>NO ITEM IN CART</h3></td></tr></table>";
  echo $mytable;
}
?>
