<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <?php
echo $_SERVER['REQUEST_TIME'];
echo "<br>";
echo     $_SERVER['HTTP_HOST'];
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SERVER_PROTOCOL'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";

echo $_SERVER['REMOTE_PORT'];
echo "<br>";
echo $_SERVER['SCRIPT_FILENAME'];
echo "<br>";
echo $_SERVER['SERVER_ADMIN'];
echo "<br>";
echo $_SERVER['SERVER_PORT'];

?>
</body>
</html>