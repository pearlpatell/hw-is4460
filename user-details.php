<html>
<head>
<h1>User Details</h1>
</head>
</html>


<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$id = $_GET['ID'];
$query = "SELECT * FROM user where ID = $ID ";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	ID: $row[ID]</a>
	username: $row[username]
	forename: $row[forename]
	surname: $row[surname]
	password: $row[password]	
	</pre>
	
	<form action='deleteRecord.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='ID' value='$row[ID]'>
		<input type='submit' value='DELETE RECORD'>	
	</form>

	
	
_END;

}

$conn->close();



?>