<html>
<head>
<h1>User List</h1>
</head>
</html>

<?php
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "Select * from user"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
		echo "ID: <a href=user-details.php?id=$row[ID]>".$row['ID'].'</a><br>';
	echo 'Username: '.$row['username'].'<br>';
	echo 'Forename: '.$row['forename'].'<br>';
	echo 'Surname: '.$row['surname'].'<br>';
	echo 'Password: '.$row['password'].'<br>';
	echo '<br>';
}

$result->close();
$conn->close();

?>