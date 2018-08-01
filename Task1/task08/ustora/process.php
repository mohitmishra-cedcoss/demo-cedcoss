<?php
$user=trim($_REQUEST['username']);
$pass=trim($_REQUEST['password']);
$conn =new mysqli('localhost', 'root','', 'demo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $sql = "select * from user where name='$user' and password='$pass'";
 echo $sql;
 $result = $conn->query($sql);
 while($row = $result->fetch_array(MYSQLI_ASSOC))
   {
   	if($row['role']=='admin')
   	{
   		session_start();
   		$_SESSION['admin']= array('id' => $row["id"],'name'=>$row['name'],'role'=>$row['role'] );

    	header("location:index.php");
    }
   	else
   	{
   		session_start();
   		$_SESSION['user']= array('id' => $row["id"],'name'=>$row['name'],'role'=>$row['role'] );
   		header("location:indexp.php");
   	}
  }

?>