<!DOCTYPE html>
<html>
<head>
<?php

$name=$email="";
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
   $name = $_POST["name"];
  $email = $_POST["email"];
}




 




?>
    <title>Welcome php</title>
</head>
<body>






<?php 
echo $name;
echo $email;
?>

</body>
</html>