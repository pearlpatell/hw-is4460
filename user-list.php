<?php
require_once 'login-page.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "Select * from usertable"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
		echo 'ID: '.$row['id'].'<br>';
	echo 'Username: '.$row['username'].'<br>';
	echo 'Forename: '.$row['forename'].'<br>';
	echo 'Surname: '.$row['surname'].'<br>';
	echo 'Password: '.$row['password'].'<br>';
	echo '<br>';
}

$result->close();
$conn->close();

?>