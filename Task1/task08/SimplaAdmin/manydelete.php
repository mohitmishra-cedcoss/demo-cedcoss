<?php  
if(isset($_POST['save'])){
$checkbox = $_POST['check'];
for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
mysqli_query($conn,"DELETE FROM employee WHERE userid='".$del_id."'");
$message = "Data deleted successfully !";
}
}
?>