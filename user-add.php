<html>
	<head>
	
	</head>
	
	<body>
		<button>
		<li><a href="user-list.php">User List</a></li>
		</button>
				<button>
		<li><a href="user-details.php">User Details</a></li>
		</button>
		<form method='post' action='user-add.php'>
			<pre>
				id: <input type='text' name='id'>
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
require_once  'login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if ISBN exists
if(isset($_POST['ID'])) 
{
	//Get data from POST object
	$ID = $_POST['ID'];
	$username = $_POST['username'];
	$forename = $_POST['forename'];
	$surname = $_POST['surname'];
	$password = $_POST['password'];
	
	//echo $isbn.'<br>';
	
		$query = "INSERT INTO user (ID, username, forename, surname, password) VALUES ('$ID', '$username','$forename', '$surname', '$password')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: user-details.php");//this will return you to the view all page
	
	
	
	
}



?>

//$page_roles = array('admin,user');
//deleted part
echo <<<_END
<form action="add-review.php" method="post"><pre>
	Food_ID<input type="text" name="Food_ID"></br></br>
	MemberID <input type="text" name="MemberID"></br></br>
	Review <input type="text" name="Review"></br></br>
	Rating <input type="int" name="Rating"></br></br>
	Date <input type="text" name="Date"></br></br>
	<input type="submit" name="Add Review">
	</br></br>
	</br></br>
	<a href="view-review.php" > View All Reviews</a>
		<a href='logout.php'>Logout</a>	
</pre></form>
_END;

<?php


require_once 'login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);


if(isset($_POST['Food_ID']) &&
	isset($_POST['MemberID']) &&
	isset($_POST['Review']) &&
	isset($_POST['Rating']) &&
	isset($_POST['Date'])) {
		$Food_ID=get_post($conn, 'Food_ID');
		$MemberID=get_post($conn, 'MemberID');
		$Review=get_post($conn, 'Review');
		$Rating=get_post($conn, 'Rating');
		$Date=get_post($conn, 'Date');

		$query="INSERT INTO Review (Food_ID, MemberID, Review, Rating, Date) VALUES ".
			"($Food_ID, $MemberID, '$Review',$Rating,'$Date')";
		echo $query;
		$result=$conn->query($query);
		if(!$result) echo "INSERT failed: $query <br>" .
			$conn->error . "<br><br>";
	
	
}
 

$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>