<?php
require_once('config.php');
?>
<html>

<body>
	
	<div>
		
	<?php
	if (isset($_POST['create'])) {
		$firstname 	= $_POST['firstname'];
		$lastname 	= $_POST['lastname'];
		$mail 		= $_POST['mail'];
		$password 	= $_POST['password'];

		$sql = "SELECT * FROM users WHERE mail='$mail'";
        $results = mysqli_query($conn, $sql);
        //$row = mysqli_fetch_array($results);
        $count = mysqli_num_rows($results);
        if($count == 0)
        {

			$sql = "INSERT INTO users (firstname, lastname, mail, password ) VALUES ('$firstname', '$lastname', '$mail', '$password')";
			if(mysqli_query($conn, $sql))
			{
				echo "Успешно регистриран!";
			} 
			else
			{
				echo "Грешка при регистрацията!";
			}
		}
		else
		{
			echo "Вече съществува такъв имейл!";
		}
	}
	?>

	</div>

	<div>
		
		<form action="index.php" method="post">
			
			<div class="container">
				<h1>Registration</h1>

				<label for="firstName"><b>FirstName</b></label>
				<input type="text" name="firstname" required>
				<br>
				<hr>
				<label for="lastName"><b>LastName</b></label>
				<input type="text" name="lastname" required>
				<br>
				<hr>
				<label for="mail"><b>Email Addres</b></label>
				<input type="email" name="mail" required>
				<br>
				<hr>
				<label for="password"><b>Password</b></label>
				<input type="password" name="password" required>

				<input type="submit" name="create" value="Sign Up">

			</div>

		</form>

	</div>

</body>

</html>