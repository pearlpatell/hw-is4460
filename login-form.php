<html>
	<head>
		<title> Login Page </title>
	</head>
	<body>
	<nav>
      <ul>
        <li><a href="user-list.php">User List</a></li>
        <li><a href="user-details.php">User Details</a></li>
        <li><a href="user-add.php">Add User</a></li>
      </ul>
    </nav>
		<h1> Login </h1>
		<form action='login-form.php' method= 'post'>
		<label for='username'> Username: </label>
		<input type='text' id='username' name='username'>
		<br>
		<label for='password'> Password: </label>
		<input type='password' id='password' name='password'>
		<br>
		<input type='submit' value='login'>
	</form>
	</body>
	<p>
	<a href='user-list.php'> List of users 
	</p>
</html>

<?php

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	$query = "SELECT password FROM user WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";

		session_start();
		$_SESSION['username'] = $tmp_username;
		
		header("Location: user-add.php");
	}
	else
	{
		echo "login error<br>";
	}	
	
}

$conn->close();


function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}



?>