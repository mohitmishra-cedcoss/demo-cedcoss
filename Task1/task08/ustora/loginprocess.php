<?php
$user=trim($_REQUEST['username']);
echo $user;
$pass=trim($_REQUEST['password']);
echo $pass;
$conn =new mysqli('localhost', 'root','', 'demo');

 //Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $sql = "select * from Users where name='$user' and password='$pass'";
 echo $sql;
 $result = $conn->query($sql);
 while($row = $result->fetch_array(MYSQLI_ASSOC))
   {
   	if($row['type']=='admin')
   	{
   		session_start();
   		$_SESSION['admin']= array('id' => $row["id"],'name'=>$row['name'],'role'=>$row['type'] );

    	header("location:http://192.168.0.162/Task1/task08/SimplaAdmin/Adduser.php");
    }
   	else
   	{
   		session_start();
   		$_SESSION['user']= array('id' => $row["id"],'name'=>$row['name'],'img'=>$row['img'],'pass'=>$row['password'],'role'=>$row['type'] );
   		header("location:checkout.php");
   	}
  }

?>