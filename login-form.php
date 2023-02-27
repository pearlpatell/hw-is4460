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
		<form action='login.php' method= 'post'>
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
	<a href='user-list.html'> List of users 
	</p>
</html>