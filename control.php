<?php

ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
error_reporting(0);

$username = $_POST['user'];
$password = $_POST['password'];

$con = mysqli_connect("127.0.0.1", "root");
$query = mysqli_query ($con, "SELECT * FROM users WHERE usuario ='" . $username . "' AND password = '" . $password . "'");
$q = mysql_query($query, $con);
while ($result=mysqli_fetch_array($q)) {
    if ($result['usuario']== $username) {
        header("Location: index.php;");
    } else {
        header("Location: login.php;");
    }
}
mysql_close($con);
?>