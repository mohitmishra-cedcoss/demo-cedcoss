<?php include 'config.php' ?>
<?php
global $conn;
$idArr=$_REQUEST['id'];
$action=$_REQUEST['action'];
print_r($idArr);
switch ($action) {
	case 'product':
		foreach($idArr as $id){
			        mysqli_query($conn,"DELETE FROM product WHERE id=".$id);
			            //echo "DELETE FROM User WHERE userId=".$idArr;
			        }
			        $_SESSION['success_msg'] = 'products have been deleted successfully.';
		break;

		case 'user':
		foreach($idArr as $id){
			        mysqli_query($conn,"DELETE FROM Users WHERE id=".$id);
			            //echo "DELETE FROM User WHERE userId=".$idArr;
			        }
			        $_SESSION['success_msg'] = 'products have been deleted successfully.';
		break;
	
	default:
		# code...
		break;
}






foreach($idArr as $id){
			        mysqli_query($conn,"DELETE FROM product WHERE id=".$id);
			            //echo "DELETE FROM User WHERE userId=".$idArr;
			        }
			        $_SESSION['success_msg'] = 'products have been deleted successfully.';
			        //header("Location:manage user.php");
			            //echo "'Users have been deleted successfully.'";

	        		


	?>