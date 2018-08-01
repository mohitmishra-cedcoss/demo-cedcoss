<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
   <?php  

$name=$email="";
$nameErr=$emailErr="";
if($_SERVER["REQUEST_METHOD"]=="POST")
  {

  	if(empty($_POST["name"]))
  	{
     $nameErr="Name is empty";
       

  	}
  		else{  $name = test_input($_POST["name"]);

if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }


  	}
  	if(empty($_POST["email"]))
  	{
     $emailErr="email is empty";
       

  	}
  		else{  $email = test_input($_POST["email"]);


  	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
}
 
  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




   ?>



</head>
<body>
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Name:<input type="text" name="name"></input><span><?php echo $nameErr ?></span><br/>
      <br>	
       Email:<input type="text" name="email"></input><span><?php echo $emailErr ?></span><br/>
      	<input type="submit" value="Submit"></input>
      </form>





<?php 
echo $name;
echo $email;
?>
      





</body>
</html>