<?php
$pwd = $_POST['password'];
if ($pwd == 'hogarium') {
	header("Location: index.php");
} else {
	header("Location: lockscreen.html");
}