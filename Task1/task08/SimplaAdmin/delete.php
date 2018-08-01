<?php include 'config.php' ?>
<?php  
$id=$_REQUEST['id'];
global $id;
echo $id;
$action=$_REQUEST['action'];

echo $action;
switch ($action) {
	case 'delep':

		deleteproduct($id);
		break;
	case 'deleC':
	      
		deletecategory($id);
		break;
	
    case 'deleU':
          deleteUser($id);
         break;


	default:
		# code...
		break;
}
function deleteproduct($id)
{
global $conn;

$sql="delete from product where id=$id";
$result=$conn->query($sql);
if($result==TRUE)
{
	echo "Product deleted succesfully";
	header("location:ManageProduct.php");
}
else
{
	echo "eror in deleting";
}
}
function deletecategory($id)
{

global $conn;

$sql="delete from category where id=$id";
$result=$conn->query($sql);
if($result==TRUE)
{
	echo "deleted succesfully";
	header("location:ManageCategories.php");
	
}
else
{
	echo "eror in deleting";
}

}
function deleteUser($id)
{

global $conn;

$sql="delete from Users where id=$id";
$result=$conn->query($sql);
if($result==TRUE)
{
	echo "deleted succesfully";
	header("location:Manageuser.php");
	
}
else
{
	echo "eror in deleting";
}

}

?>