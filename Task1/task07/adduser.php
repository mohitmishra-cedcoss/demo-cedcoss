<?php
include 'function.php'; 
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Add User</title>
</head>
<body>
     <form method="POST" action="Adduserprocess.php">
     <label>Username:<input type="text" name="username"></input></label>	
     <label>Password:<input type="text" name="password"></input></label>	
     <label>Role:<input type="text" name="role"></input></label>	
     <label><input type="submit" value="addUser"></input></label>	
 

     </form>
     <div><?php displayUser(); ?></div>
</body>
</html>