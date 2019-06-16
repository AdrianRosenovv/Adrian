<?php
require_once('config.php');
?>

<?php
$mail = '';
$password = '';

$error = false;

if ( isset( $_POST[ 'submit' ] ) ) {

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    if (!$error) {

        $sql = "SELECT * FROM users WHERE mail='$mail'";
        $results = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($results);
        $count = mysqli_num_rows($results);

        if ($count == 1 && $row['password'] == $password) {
            echo 'Здравей, ' . $row['firstname'], $row['lastname'];
        } else {
            echo 'Не си логнат';
        }


    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
<div id="frm">
    <form action="http://localhost/login.php" method="POST">
        <p>
            <label>Email:</label>
            <input type="text" id="mail" name="mail">
        </p>
        <p>
            <label>Password:</label>
            <input type="password" id="password" name="password">
        </p>
        <p>
            <input type="submit" id="btn" name="submit" value ="Login">
        </p>
    </form>
</div>
</body>
</html>
