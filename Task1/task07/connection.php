<?php 
 global $conn =new mysqli('localhost', 'root','', 'demo');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
else
{
	echo "connected succesfuly";
}

?>