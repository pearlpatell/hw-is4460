<html>
	<head>
	
	</head>
	
	<body>
		<form method='post' action='addRecord.php'>
			<pre>
				ID: <input type='text' name='ID'>
				username: <input type='text' name='username'>
				forename: <input type='text' name='forename'>
				surname: <input type='text' name='surname'>
				password: <input type='text' name='password'>
				<input type='submit' value='Add Record'>
			</pre>
		</form>
	</body>
</html>


<?php
//import credentials for db
require_once  'login-page.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if ISBN exists
if(isset($_POST['isbn'])) 
{
	//Get data from POST object
	$ID = $_POST['ID'];
	$username = $_POST['username'];
	$forename = $_POST['forename'];
	$surname = $_POST['surname'];
	$password = $_POST['password'];
	
	//echo $isbn.'<br>';
	
	$query = "INSERT INTO classics (ID, username, forename, surname, password) VALUES ('$ID', '$username','$forename', '$surname', '$password')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: user-details.php");//this will return you to the view all page
	
	
	
	
}



?>